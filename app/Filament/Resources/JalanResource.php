<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JalanResource\Pages;
use App\Filament\Resources\JalanResource\RelationManagers;
use App\Models\Jalan;
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
use Illuminate\Database\Query\Expression;

class JalanResource extends Resource
{
    protected static ?string $model = Jalan::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';

    protected static ?string $navigationLabel = 'Kondisi Jalan';

    protected static ?string $navigationGroup = 'Data';

    protected static ?int $navigationSort = 12;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('FOTO')
                    ->label('Foto')
                    ->disk('s3')
                    ->directory('desa-template/images/jalan')
                    ->visibility('private')
                    ->preserveFilenames()
                    ->required(),
                Forms\Components\Select::make('PERKERASAN')
                    ->label('Perkerasan')
                    ->options([
                        'Aspal' => 'Aspal',
                        'Beton/Cor' => 'Beton/Cor',
                    ])
                    ->required(),
                Forms\Components\Select::make('KONDISI')
                    ->label('Kondisi')
                    ->options([
                        'Baik' => 'Baik',
                        'Kurang Baik' => 'Kurang Baik',
                        'Tidak Baik' => 'Tidak Baik',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('SUMBER')
                    ->label('Sumber')
                    ->required()
                    ->maxLength(255),
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
                Tables\Columns\TextColumn::make('Name')
                    ->label('Nama')
                    ->sortable(query: function ($query, $direction) {
                        return $query->orderBy(new Expression('"Name"'), $direction);
                    })
                    ->searchable(query: function ($query, $search) {
                        return $query->orWhere(new Expression('LOWER("Name")'), 'LIKE', '%' . strtolower($search) . '%');
                    })
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\ImageColumn::make('FOTO')
                    ->getStateUsing(function ($record) {
                        return $record->getFotoUrl(); // Method to get full URL
                    })
                    ->label('Foto'),
                Tables\Columns\TextColumn::make('PERKERASAN')
                    ->label('Perkerasan')
                    ->sortable(query: function ($query, $direction) {
                        return $query->orderBy(new Expression('"PERKERASAN"'), $direction);
                    })
                    ->searchable(query: function ($query, $search) {
                        return $query->orWhere(new Expression('LOWER("PERKERASAN")'), 'LIKE', '%' . strtolower($search) . '%');
                    })
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('KONDISI')
                    ->label('Kondisi')
                    ->sortable(query: function ($query, $direction) {
                        return $query->orderBy(new Expression('"KONDISI"'), $direction);
                    })
                    ->searchable(query: function ($query, $search) {
                        return $query->orWhere(new Expression('LOWER("KONDISI")'), 'LIKE', '%' . strtolower($search) . '%');
                    })
                    ->toggleable(isToggledHiddenByDefault: false),
                Tables\Columns\TextColumn::make('SUMBER')->label('Sumber'),
                Tables\Columns\TextColumn::make('longitude')->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('latitude')->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListJalans::route('/'),
            'create' => Pages\CreateJalan::route('/create'),
            'edit' => Pages\EditJalan::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
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
        $jalans = Jalan::all();

        $geojson = [
            'type' => 'FeatureCollection',
            'name' => 'kondisi_jalan',
            'features' => [],
        ];

        foreach ($jalans as $jalan) {
            $geojson['features'][] = [
                'type' => 'Feature',
                'properties' => [
                    'Name' => $jalan->Name,
                    'FOTO' => $jalan->FOTO,
                    'PERKERASAN' => $jalan->PERKERASAN,
                    'KONDISI' => $jalan->KONDISI,
                    'SUMBER' => $jalan->SUMBER,
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$jalan->longitude, $jalan->latitude, 0.0],
                ],
            ];
        }

        $jsonContent = json_encode($geojson, JSON_PRETTY_PRINT);

        Storage::disk('s3')->put('desa-template/geojson/kondisi_jalan.geojson', $jsonContent);
    }
}
