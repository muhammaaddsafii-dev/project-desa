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
                ->relationship('user', 'name')
                ->required(),
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('User Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('type')
                    ->label('Type')
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
