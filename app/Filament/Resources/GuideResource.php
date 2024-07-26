<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuideResource\Pages;
use App\Filament\Resources\GuideResource\RelationManagers;
use App\Models\Guide;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\HtmlString;

class GuideResource extends Resource
{
    protected static ?string $model = Guide::class;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';

    protected static ?string $navigationLabel = 'Panduan';

    protected static ?string $navigationGroup = 'Layanan';

    protected static ?int $navigationSort = 8;

    public static ?string $label = 'Panduan';

    public static function getSlug(): string
    {
        return 'panduan';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('pdf_file')
                    ->disk('s3')
                    ->directory('desa-template/panduan')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('pdf_file')
                    ->label('PDF URL')
                    ->formatStateUsing(function ($record) {
                        $baseUrl = 'https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com';
                        $filePath = $record->pdf_file;
                        $fullUrl = $baseUrl . '/' . $filePath;

                        return new HtmlString(
                            '<div>' .
                                '<span style="display: block; color: #D97706;">' . basename($filePath) . '</span>' .
                                '<a class="text-center" style="color: #D97706; display: block;" href="' . $fullUrl . '" target="_blank">View PDF</a>' .
                                '</div>'
                        );
                    })
                    ->html(),
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
            'index' => Pages\ListGuides::route('/'),
            'create' => Pages\CreateGuide::route('/create'),
            'edit' => Pages\EditGuide::route('/{record}/edit'),
        ];
    }
}
