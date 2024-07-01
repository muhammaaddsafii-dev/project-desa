<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResidentResource\Pages;
use App\Filament\Resources\ResidentResource\RelationManagers;
use App\Models\Resident;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResidentResource extends Resource
{
    protected static ?string $model = Resident::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationLabel = 'Penduduk';

    protected static ?string $navigationGroup = 'Data Statistik';

    protected static ?int $navigationSort = 10;

    public static ?string $label = 'Penduduk';

    public static function getSlug(): string
    {
        return 'penduduk';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('kks_id')
                    ->relationship('kks', 'nama_kk')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nomor_kk')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nama_kk')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->required(),
                Forms\Components\TextInput::make('nik')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status_perkawinan')
                    ->options([
                        'Belum Menikah' => 'Belum Menikah',
                        'Menikah' => 'Menikah',
                        'Cerai' => 'Cerai',
                    ])
                    ->nullable(),
                Forms\Components\Select::make('jenis_kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->nullable(),
                Forms\Components\TextInput::make('pendidikan')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('pekerjaan')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('penghasilan_per_bulan')
                    ->numeric()
                    ->nullable(),
                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->nullable(),
                Forms\Components\TextInput::make('whatsapp')
                    ->maxLength(255)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kks.nama_kk')
                    ->label('Nama KK')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('pekerjaan')
                    ->label('Pekerjaan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->label('WhatsApp')
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListResidents::route('/'),
            'create' => Pages\CreateResident::route('/create'),
            'edit' => Pages\EditResident::route('/{record}/edit'),
        ];
    }
}
