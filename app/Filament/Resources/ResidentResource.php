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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
                Forms\Components\TextInput::make('Nomor')->required(),
                Forms\Components\FileUpload::make('Foto')
                    ->image()
                    ->directory('resident-photos')
                    ->visibility('public'),
                Forms\Components\TextInput::make('Nama_Kepal')->label('Nama Kepala Keluarga'),
                Forms\Components\Select::make('Jenis_Kela')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ]),
                Forms\Components\TextInput::make('Status_Tem')->label('Status Tempat Tinggal'),
                Forms\Components\TextInput::make('Luas_Lanta')->label('Luas Lantai'),
                Forms\Components\TextInput::make('Jenis_Lant')->label('Jenis Lantai'),
                Forms\Components\TextInput::make('Jenis_Dind')->label('Jenis Dinding'),
                Forms\Components\TextInput::make('Fasilitas_')->label('Fasilitas 1'),
                Forms\Components\TextInput::make('Fasilitas1')->label('Fasilitas 2'),
                Forms\Components\TextInput::make('Fasilita_1')->label('Fasilitas 3'),
                Forms\Components\TextInput::make('Bahan_Baka')->label('Bahan Bakar'),
                Forms\Components\TextInput::make('Kartu_Jami')->label('Kartu Jaminan'),
                Forms\Components\TextInput::make('Akses_Info')->label('Akses Informasi'),
                Forms\Components\TextInput::make('RT'),
                Forms\Components\TextInput::make('RW'),
                Forms\Components\Textarea::make('Keterangan'),
                Forms\Components\TextInput::make('Profesi_KK')->label('Profesi Kepala Keluarga'),
                Forms\Components\TextInput::make('NIK'),
                Forms\Components\TextInput::make('DATA'),
                Forms\Components\TextInput::make('Jumlah_KK')->label('Jumlah KK'),
                Forms\Components\TextInput::make('SUMBER')->label('Sumber'),
                Forms\Components\TextInput::make('latitude')->numeric(),
                Forms\Components\TextInput::make('longitude')->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Nomor'),
                Tables\Columns\ImageColumn::make('Foto'),
                Tables\Columns\TextColumn::make('Nama_Kepal')->label('Nama Kepala Keluarga'),
                Tables\Columns\TextColumn::make('Jenis_Kela')->label('Jenis Kelamin'),
                Tables\Columns\TextColumn::make('RT'),
                Tables\Columns\TextColumn::make('RW'),

            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListResidents::route('/'),
            'create' => Pages\CreateResident::route('/create'),
            'edit' => Pages\EditResident::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes();
    }

    public static function afterCreate(Resident $record): void
    {
        static::updateGeoJson();
    }

    public static function afterUpdate(Resident $record): void
    {
        static::updateGeoJson();
    }

    public static function afterDelete(Resident $record): void
    {
        static::updateGeoJson();
    }

    protected static function updateGeoJson(): void
    {
        $residents = Resident::all();

        $features = $residents->map(function ($resident) {
            return [
                'type' => 'Feature',
                'properties' => $resident->toArray(),
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$resident->longitude, $resident->latitude, 0.0],
                ],
            ];
        });

        $geoJson = [
            'type' => 'FeatureCollection',
            'name' => 'penduduk.geojson',
            'features' => $features,
        ];

        $json = json_encode($geoJson, JSON_PRETTY_PRINT);

        Storage::disk('s3')->put('desa-template/geojson/penduduk.geojson', $json);
    }

    public static function getWidgets(): array
    {
        return [
            ResidentResource\Widgets\JumlahPendudukRT::class,
            ResidentResource\Widgets\KartuJaminan::class,
        ];
    }
}
