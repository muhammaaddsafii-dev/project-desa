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
                Forms\Components\Select::make('rts_id')
                    ->relationship('rts', 'nama_rt')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nomor_rt')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nama_rt')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->required(),
                Forms\Components\Select::make('rws_id')
                    ->relationship('rws', 'nama_rw')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nomor_rw')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('nama_rw')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->required(),
                Forms\Components\TextInput::make('nik')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status_hubungan')
                    ->options([
                        'Suami' => 'Suami',
                        'Istri' => 'Istri',
                        'Anak' => 'Anak',
                    ])
                    ->required(),
                Forms\Components\Select::make('status_perkawinan')
                    ->options([
                        'Belum Menikah' => 'Belum Menikah',
                        'Menikah' => 'Menikah',
                        'Cerai' => 'Cerai',
                    ])
                    ->required(),
                Forms\Components\Select::make('jenis_kelamin')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ])
                    ->required(),
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
                    ->required(),
                Forms\Components\TextInput::make('whatsapp')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('kepemilikan_harta_lancar')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('kemampuan_konsumsi')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('rasio_pengeluaran_pangan')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('jenis_konsumsi')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('kemampuan_membeli_pakaian')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('status_tempat_tinggal')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('luas_lantai')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('jenis_lantai')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('jenis_dinding')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('fasilitas_mck')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('fasilitas_ipal')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('fasilitas_energi_penerangan')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('fasilitas_air_minum')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('bahan_bakar')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('kartu_jaminan_kesehatan')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('kemampuan_berobat')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\TextInput::make('akses_informasi')
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
                Tables\Columns\TextColumn::make('rts.nama_rt')
                    ->label('RT')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('rws.nama_rw')
                    ->label('RW')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik')
                    ->label('NIK')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_hubungan')
                    ->label('Status Hubungan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_perkawinan')
                    ->label('Status Perkawinan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin0')
                    ->label('Jenis Kelamin')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('pendidikan')
                    ->label('Pendidikan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('pekerjaan')
                    ->label('Pekerjaan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('penghasilan_per_bulan')
                    ->label('Penghasilan Per Bulan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->label('WhatsApp')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kepemilikan_harta_lancar')
                    ->label('Kepemilikan Harta Lancar')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kemampuan_konsumsi')
                    ->label('Kemampuan Konsumsi')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('rasio_pengeluaran_pangan')
                    ->label('Rasio Pengeluaran Pangan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_konsumsi')
                    ->label('Jenis Konsumsi')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kemampuan_membeli_pakaian')
                    ->label('Kemampuan Membeli Pakaian')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_tempat_tinggal')
                    ->label('Status Tempat Tinggal')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('luas_lantai')
                    ->label('Luas Lantai')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_dinding')
                    ->label('Jenis Dinding')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('fasilitas_mck')
                    ->label('Fasilitas MCK')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('fasilitas_ipal')
                    ->label('Fasilitas IPAL')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('fasilitas_energi_penerangan')
                    ->label('Fasilitas Energi Penerangan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('fasilitas_air_minum')
                    ->label('Fasilitas Air Minum')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('bahan_bakar')
                    ->label('Bahan Bakar')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kartu_jaminan_kesehatan')
                    ->label('Kartu Jaminan Kesehatan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kemampuan_berobat')
                    ->label('Kemampuan Berobat')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('akses_informasi')
                    ->label('Akses Informasi')
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
