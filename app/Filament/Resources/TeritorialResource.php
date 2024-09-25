<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeritorialResource\Pages;
use App\Filament\Resources\TeritorialResource\RelationManagers;
use App\Models\Teritorial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeritorialResource extends Resource
{
    protected static ?string $model = Teritorial::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationLabel = 'Wilayah';

    protected static ?string $navigationGroup = 'Data';

    protected static ?int $navigationSort = 9;

    public static ?string $label = 'wilayah';

    public static function getSlug(): string
    {
        return 'wilayah';
    }

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
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTeritorials::route('/'),
            'create' => Pages\CreateTeritorial::route('/create'),
            'edit' => Pages\EditTeritorial::route('/{record}/edit'),
        ];
    }

    protected static bool $shouldRegisterNavigation = false;
}
