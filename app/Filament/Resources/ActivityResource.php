<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityResource\Pages;
use App\Filament\Resources\ActivityResource\RelationManagers;
use App\Models\Activity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';

    protected static ?string $navigationLabel = 'Kegiatan';

    protected static ?string $navigationGroup = 'Informasi';

    protected static ?int $navigationSort = 21;

    public static ?string $label = 'Kegiatan Masyarakat';

    public static function getSlug(): string
    {
        return 'kegiatan-masyarakat';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required()->maxLength(255),
                Select::make('category')
                    ->label('Category')
                    ->options([
                        'Internal' => 'Internal',
                        'Eksternal' => 'Eksternal',
                    ])
                    ->required(),
                FileUpload::make('image')
                    ->required()
                    ->label('Image Cover')
                    ->disk('s3')
                    ->directory('desa-template/kegiatan')
                    ->visibility('private')
                    ->preserveFilenames(),
                RichEditor::make('description')
                    ->maxLength(65535)
                    ->columnSpan('full')
                    ->required(),
                Forms\Components\Repeater::make('images')
                    ->required()
                    ->relationship()
                    ->schema([
                        Forms\Components\FileUpload::make('image_path')
                            ->disk('s3')
                            ->directory('desa-template/kegiatan')
                            ->preserveFilenames()
                            ->maxFiles(5),
                    ])
                    ->columns(1),
                Forms\Components\DatePicker::make('date')->required()->maxDate(now()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->words(3),
                TextColumn::make('category')->searchable()->words(3),
                TextColumn::make('description')->searchable()->words(3),
                // ImageColumn::make('image')
                //     ->url(fn ($record) => 'https://cdn-project-desa.s3.ap-southeast-1.amazonaws.com/' . $record->image),
                TextColumn::make('date'),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options([
                        'Internal' => 'Internal',
                        'Eksternal' => 'Eksternal',
                    ]),
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
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivity::route('/create'),
            'edit' => Pages\EditActivity::route('/{record}/edit'),
        ];
    }
}
