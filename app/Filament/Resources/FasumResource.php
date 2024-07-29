<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FasumResource\Pages;
use App\Filament\Resources\FasumResource\RelationManagers;
use App\Models\Fasum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Dotswan\MapPicker\Fields\Map;
use Filament\Forms\Set;

class FasumResource extends Resource
{
    protected static ?string $model = Fasum::class;

    protected static ?string $navigationGroup = 'Data';

    protected static ?string $navigationLabel = 'Fasilitas Umum';

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('foto')
                    ->disk('s3')
                    ->directory('desa-template/images/fasilitas-umum')
                    ->visibility('private')
                    ->preserveFilenames(),
                Forms\Components\TextInput::make('jenis')->required(),
                Forms\Components\TextInput::make('objek')->nullable(),
                Forms\Components\TextInput::make('toponim')->required(),
                Forms\Components\TextInput::make('sumber')->required(),
                Forms\Components\TextInput::make('keterangan')->required(),
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
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->getStateUsing(function ($record) {
                        return $record->getFotoUrl(); // Method to get full URL
                    })
                    ->label('Foto'),
                Tables\Columns\TextColumn::make('jenis'),
                Tables\Columns\TextColumn::make('objek'),
                Tables\Columns\TextColumn::make('toponim'),
                Tables\Columns\TextColumn::make('sumber'),
                Tables\Columns\TextColumn::make('keterangan'),
                Tables\Columns\TextColumn::make('latitude'),
                Tables\Columns\TextColumn::make('longitude'),
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
            'index' => Pages\ListFasums::route('/'),
            'create' => Pages\CreateFasum::route('/create'),
            'edit' => Pages\EditFasum::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes();
    }

    public static function afterSave(): void
    {
        self::updateGeojsonFile();
    }

    public static function afterDelete(): void
    {
        self::updateGeojsonFile();
    }

    protected static function updateGeojsonFile(): void
    {
        $fasums = Fasum::all();

        $geojson = [
            'type' => 'FeatureCollection',
            'name' => 'fasilitas_umum',
            'features' => [],
        ];

        foreach ($fasums as $fasum) {
            $geojson['features'][] = [
                'type' => 'Feature',
                'properties' => [
                    'foto' => $fasum->foto,
                    'jenis' => $fasum->jenis,
                    'objek' => $fasum->objek,
                    'toponim' => $fasum->toponim,
                    'sumber' => $fasum->sumber,
                    'keterangan' => $fasum->keterangan,
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$fasum->longitude, $fasum->latitude, 0.0],
                ],
            ];
        }

        $jsonContent = json_encode($geojson, JSON_PRETTY_PRINT);

        Storage::disk('s3')->put('desa-template/geojson/fasum.geojson', $jsonContent);
    }
}
