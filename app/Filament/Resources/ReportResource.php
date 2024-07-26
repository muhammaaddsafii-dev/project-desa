<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportResource\Pages;
use App\Filament\Resources\ReportResource\RelationManagers;
use App\Models\Report;
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

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';

    protected static ?string $navigationLabel = 'Laporan / Aduan';

    protected static ?string $navigationGroup = 'Layanan';

    protected static ?int $navigationSort = 7;

    public static ?string $label = 'Laporan Masyarakat';

    public static function getSlug(): string
    {
        return 'laporan-masyarakat';
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
                Forms\Components\TextInput::make('subject')->required()->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255),
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
                Forms\Components\Repeater::make('images')
                    ->relationship()
                    ->schema([
                        Forms\Components\FileUpload::make('image_path')
                            ->disk('s3')
                            ->directory('desa-template/laporan')
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
                TextColumn::make('user.name')
                    ->label('User Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')->searchable()->words(3),
                Tables\Columns\TextColumn::make('description')->words(3),
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
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}
