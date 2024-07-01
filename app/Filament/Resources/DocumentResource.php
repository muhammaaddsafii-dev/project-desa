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
                // Forms\Components\Select::make('user_id')
                // ->relationship('user', 'name')
                // ->required(),
                Forms\Components\Select::make('user_id')
                    ->options(function () {
                        $user = Auth::user();
                        return User::where('id', $user->id)->pluck('name', 'id');
                    })
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->visible(fn (string $context): bool => $context === 'create'),
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
                    ->inline(),
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
                FileUpload::make('file'),
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
