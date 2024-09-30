<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnnouncementResource\Pages;
use App\Filament\Resources\AnnouncementResource\RelationManagers;
use App\Models\Announcement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\RichEditor;

class AnnouncementResource extends Resource
{
    protected static ?string $model = Announcement::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $navigationLabel = 'Pengumuman';

    protected static ?string $navigationGroup = 'Informasi';

    protected static ?int $navigationSort = 22;

    public static ?string $label = 'Pengumuman';

    public static function getSlug(): string
    {
        return 'pengumuman';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->label('Judul')->required()->maxLength(255),
                Forms\Components\DatePicker::make('published_at')->label('Tanggal Dibuat')->required()->maxDate(now()),
                Forms\Components\TextInput::make('content')
                    ->label('Isi Pengumuman')
                    ->maxLength(65535)
                    ->columnSpan('full'),
                Forms\Components\Repeater::make('images')
                    ->label('Gambar')
                    ->relationship()
                    ->schema([
                        Forms\Components\FileUpload::make('image_path')
                            ->label('Gambar')
                            ->disk('s3')
                            ->directory('desa-template/pengumuman')
                            ->preserveFilenames()
                            ->maxFiles(5),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->words(3),
                Tables\Columns\TextColumn::make('content')->searchable()->words(3),
                Tables\Columns\TextColumn::make('published_at'),
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
            'index' => Pages\ListAnnouncements::route('/'),
            'create' => Pages\CreateAnnouncement::route('/create'),
            'edit' => Pages\EditAnnouncement::route('/{record}/edit'),
        ];
    }
}
