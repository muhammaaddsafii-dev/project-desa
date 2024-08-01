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
use Dotswan\MapPicker\Fields\Map;
use Filament\Forms\Set;


class ResidentResource extends Resource
{
    protected static ?string $model = Resident::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationLabel = 'Penduduk';

    protected static ?string $navigationGroup = 'Data';

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
                    ->disk('s3')
                    ->directory('desa-template/images/rumah-warga')
                    ->visibility('private')
                    ->preserveFilenames(),
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
                Forms\Components\Hidden::make('latitude'),
                Forms\Components\Hidden::make('longitude'),
                Map::make('location')
                    ->label('Lokasi')
                    ->columnSpanFull()
                    ->default([
                        'lat' => 40.4168,
                        'lng' => -3.7038,
                    ])
                    ->afterStateUpdated(function (Set $set, ?array $state): void {
                        // Update hidden fields
                        $set('latitude', $state['lat']);
                        $set('longitude', $state['lng']);
                    })
                    ->afterStateHydrated(function ($state, $record, Set $set): void {
                        if ($record) {
                            $set('location', ['lat' => $record->latitude ?? null, 'lng' => $record->longitude ?? null]);
                        }
                    })
                    ->liveLocation()
                    ->showMarker()
                    ->markerColor("#22c55eff")
                    ->showFullscreenControl()
                    ->showZoomControl()
                    ->draggable()
                    ->tilesUrl("https://tile.openstreetmap.de/{z}/{x}/{y}.png")
                    ->zoom(15)
                    ->detectRetina()
                    ->showMyLocationButton()
                    ->extraTileControl([])
                    ->extraControl([
                        'zoomDelta' => 1,
                        'zoomSnap' => 2,
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Resident::latestRecords())
            ->columns([
                Tables\Columns\TextColumn::make('Nomor'),
                Tables\Columns\ImageColumn::make('Foto')
                    ->getStateUsing(function ($record) {
                        return $record->getFotoUrl(); // Method to get full URL
                    })
                    ->label('Foto'),
                Tables\Columns\TextColumn::make('Nama_Kepal')->label('Nama Kepala Keluarga'),
                Tables\Columns\TextColumn::make('Jenis_Kela')->label('Jenis Kelamin'),
                Tables\Columns\TextColumn::make('Status_Tem')->label('Status Tempat Tinggal'),
                Tables\Columns\TextColumn::make('Luas_Lanta')->label('Luas Lantai'),
                Tables\Columns\TextColumn::make('Jenis_Lant')->label('Jenis Lantai'),
                Tables\Columns\TextColumn::make('Jenis_Dind')->label('Jenis Dinding'),
                Tables\Columns\TextColumn::make('Fasilitas_')->label('Fasilitas 1'),
                Tables\Columns\TextColumn::make('Fasilitas1')->label('Fasilitas 2'),
                Tables\Columns\TextColumn::make('Fasilita_1')->label('Fasilitas 3'),
                Tables\Columns\TextColumn::make('Bahan_Baka')->label('Bahan Bakar'),
                Tables\Columns\TextColumn::make('Kartu_Jami')->label('Kartu Jaminan'),
                Tables\Columns\TextColumn::make('Akses_Info')->label('Akses Informasi'),
                Tables\Columns\TextColumn::make('RT'),
                Tables\Columns\TextColumn::make('RW'),
                Tables\Columns\TextColumn::make('Keterangan'),
                Tables\Columns\TextColumn::make('Profesi_KK')->label('Profesi Kepala Keluarga'),
                Tables\Columns\TextColumn::make('NIK'),
                Tables\Columns\TextColumn::make('DATA'),
                Tables\Columns\TextColumn::make('Jumlah_KK')->label('Jumlah KK'),
                Tables\Columns\TextColumn::make('SUMBER')->label('Sumber'),
                Tables\Columns\TextColumn::make('latitude'),
                Tables\Columns\TextColumn::make('longitude'),

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
            ResidentResource\Widgets\ResidentCharts::class,
        ];
    }
}
