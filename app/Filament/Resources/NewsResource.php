<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Str;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Berita';

    protected static ?string $navigationGroup = 'Informasi';

    protected static ?int $navigationSort = 3;

    public static ?string $label = 'Berita';

    public static function getSlug(): string
    {
        return 'berita';
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
                Forms\Components\TextInput::make('title')->required()->maxLength(255)
                    ->reactive() // Tambahkan ini untuk mendengarkan perubahan
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))), // Tambahkan ini untuk mengupdate slug
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('published_at')->required()->maxDate(now()),
                FileUpload::make('image')
                    ->disk('s3')
                    ->directory('desa-template/news')
                    ->visibility('private')
                    ->preserveFilenames(),
                RichEditor::make('content')
                    ->maxLength(65535)
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->words(3),
                Tables\Columns\TextColumn::make('content')->searchable()->words(3),
                Tables\Columns\TextColumn::make('published_at'),
                Tables\Columns\TextColumn::make('user_id'),
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
