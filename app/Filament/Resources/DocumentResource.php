<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages;
use App\Filament\Resources\DocumentResource\RelationManagers;
use App\Models\Document;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\ToggleButtons;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Storage;
use Twilio\Rest\Client;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Permohonan Surat';

    protected static ?string $navigationGroup = 'Layanan';

    protected static ?int $navigationSort = 6;

    public static ?string $label = 'Permohonan Surat';

    public static function getSlug(): string
    {
        return 'permohonan-surat';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->options(function () {
                        $user = Auth::user();
                        return User::where('id', $user->id)->pluck('name', 'id');
                    })
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->visible(fn (string $context): bool => $context === 'create'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Nama'),
                Forms\Components\TextInput::make('tempat_lahir')
                    ->required()
                    ->label('Tempat Lahir'),
                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->required()
                    ->label('Tanggal Lahir'),
                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->label('Alamat'),
                Forms\Components\TextInput::make('fakultas')
                    ->required()
                    ->label('Fakultas'),
                Forms\Components\TextInput::make('nik')
                    ->required()
                    ->label('NIK'),
                ToggleButtons::make('status')
                    ->options([
                        'Diajukan' => 'Diajukan',
                        'Diproses' => 'Diproses',
                        'Selesai' => 'Selesai'
                    ])
                    ->colors([
                        'Diajukan' => 'info',
                        'Diproses' => 'warning',
                        'Selesai' => 'success'
                    ])
                    ->icons([
                        'Diajukan' => 'heroicon-o-pencil',
                        'Diproses' => 'heroicon-o-clock',
                        'Selesai' => 'heroicon-o-check-circle'
                    ])
                    ->inline()
                    ->afterStateUpdated(function ($state, $livewire) {
                        if ($state === 'Selesai') {
                            $user = User::find($livewire->data['user_id']);
                            if ($user && $user->whatsapp) {
                                $sid = env('TWILIO_SID');
                                $token = env('TWILIO_TOKEN');
                                $from = env('TWILIO_FROM');
                                $client = new Client($sid, $token);

                                $client->messages->create(
                                    $user->whatsapp,
                                    [
                                        'from' => $from,
                                        'body' => 'Dokumen Anda telah selesai diproses.'
                                    ]
                                );
                            }
                        }
                    }),
                Forms\Components\Select::make('type')
                    ->options([
                        'Surat Keterangan Slip Gaji' => 'Surat Keterangan Slip Gaji',
                        'Surat Keterangan Tidak Mampu' => 'Surat Keterangan Tidak Mampu',
                    ])->required(),
                Forms\Components\Select::make('options')
                    ->options([
                        'Soft file' => 'Soft file',
                        'Hard file ' => 'hard file',
                    ])->required(),
                FileUpload::make('file')
                    ->disk('s3')
                    ->directory('desa-template/documents')
                    ->visibility('private')
                    ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                    ->maxSize(1024)
                    ->preserveFilenames()
                    ->hidden(function () {
                        return !auth()->user()->hasRole('super_admin');
                    }),
                RichEditor::make('description')
                    ->maxLength(65535)
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $user = Auth::user();
                if (!$user->hasRole('super_admin')) {
                    $query->where('user_id', $user->id);
                }
            })
            ->columns([
                TextColumn::make('user.name')
                    ->label('User Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('type')
                    ->label('Type')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('options')
                    ->label('Options')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('description'),
                BadgeColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->colors([
                        'info' => 'Diajukan',
                        'warning' => 'Diproses',
                        'success' => 'Selesai',
                    ])
                    ->icons([
                        'heroicon-o-pencil' => 'Diajukan',
                        'heroicon-o-clock' => 'Diproses',
                        'heroicon-o-check-circle' => 'Selesai',
                    ])
                    ->formatStateUsing(function (string $state): string {
                        return ucfirst($state);
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Diajukan' => 'Diajukan',
                        'Diproses' => 'Diproses',
                        'Selesai' => 'Selesai',
                    ]),
                Tables\Filters\SelectFilter::make('options')
                    ->options([
                        'Hard file' => 'Hard file',
                        'Soft file' => 'Soft file',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('download')
                    ->label('Download')
                    ->url(fn (Document $record) => route('documents.download', $record))
                    ->openUrlInNewTab()
                    ->color('primary')
                    ->hidden(function () {
                        return !auth()->user()->hasRole('super_admin');
                    }),
                Action::make('download')
                    ->label('Download File')
                    ->url(function ($record) {
                        if ($record->file) {
                            return Storage::disk('s3')->url($record->file);
                        } else {
                            return '#';
                        }
                    })
                    ->openUrlInNewTab()
                    ->hidden(function () {
                        return auth()->user()->hasRole('super_admin');
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}
