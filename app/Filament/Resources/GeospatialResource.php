<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GeospatialResource\Pages;
use App\Filament\Resources\GeospatialResource\RelationManagers;
use App\Models\Geospatial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GeospatialResource extends Resource
{
    protected static ?string $model = Geospatial::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-asia-australia';

    protected static ?string $navigationLabel = 'Peta 1';

    protected static ?string $navigationGroup = 'Data Geospatial';

    protected static ?int $navigationSort = 11;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
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
            'index' => Pages\ListGeospatials::route('/'),
            'create' => Pages\CreateGeospatial::route('/create'),
            'edit' => Pages\EditGeospatial::route('/{record}/edit'),
        ];
    }
}
