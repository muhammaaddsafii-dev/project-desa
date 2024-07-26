<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrganizerResource\Pages;
use App\Filament\Resources\OrganizerResource\RelationManagers;
use App\Models\Organizer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\RichEditor;

class OrganizerResource extends Resource
{
    protected static ?string $model = Organizer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Perangkat Desa';

    protected static ?int $navigationSort = 2;

    public static ?string $label = 'Perangkat Desa';

    public static function getSlug(): string
    {
        return 'perangkat-desa';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required()->maxLength(255),
                Forms\Components\TextInput::make('whatsapp')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('position')
                    ->options([
                        'Kepala Desa' => 'Kepala Desa',
                        'Sekretaris Desa' => 'Sekretaris Desa',
                        'Kepala Urusan Keuangan' => 'Kepala Urusan Keuangan',
                    ])->required(),
                FileUpload::make('image')
                    ->disk('s3')
                    ->directory('desa-template/organisasi')
                    ->visibility('private')
                    ->preserveFilenames(),
                RichEditor::make('quote')
                    ->maxLength(65535)
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('position'),
                Tables\Columns\TextColumn::make('whatsapp')->searchable(),
                ImageColumn::make('image'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('position')
                    ->options([
                        'Kepala Desa' => 'Kepala Desa',
                        'Sekretaris Desa' => 'Sekretaris Desa',
                        'Kepala Urusan Keuangan' => 'Kepala Urusan Keuangan',
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
            'index' => Pages\ListOrganizers::route('/'),
            'create' => Pages\CreateOrganizer::route('/create'),
            'edit' => Pages\EditOrganizer::route('/{record}/edit'),
        ];
    }
}
