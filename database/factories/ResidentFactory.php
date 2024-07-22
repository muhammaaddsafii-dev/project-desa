<?php

namespace Database\Factories;

use App\Models\Resident;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resident>
 */
class ResidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Resident::class;
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'kks_id' => 3,
            'rts_id' => 2,
            'rws_id' => 1,
            'nik' => $this->faker->unique()->numerify('#############'),
            'status_hubungan' => $this->faker->randomElement(['Suami', 'Istri', 'Anak']),
            'status_perkawinan' => $this->faker->randomElement(['Belum Menikah', 'Menikah', 'Cerai']),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            // 'pendidikan' => $this->faker->randomElement(['SD', 'SMP', 'SMA', 'Diploma', 'Sarjana']),
            'pendidikan' => $this->faker->randomElement(['S2']),
            'pekerjaan' => $this->faker->jobTitle,
            'penghasilan_per_bulan' => $this->faker->numberBetween(1000000, 10000000),
            'tanggal_lahir' => $this->faker->date,
            'whatsapp' => $this->faker->phoneNumber,
            'kepemilikan_harta_lancar' => $this->faker->randomElement(['Ya', 'Tidak']),
            'kemampuan_konsumsi' => $this->faker->randomElement(['Tinggi', 'Sedang', 'Rendah']),
            'rasio_pengeluaran_pangan' => $this->faker->randomElement(['Tinggi', 'Sedang', 'Rendah']),
            'jenis_konsumsi' => $this->faker->randomElement(['Mewah', 'Sedang', 'Sederhana']),
            'kemampuan_membeli_pakaian' => $this->faker->randomElement(['Tinggi', 'Sedang', 'Rendah']),
            'status_tempat_tinggal' => $this->faker->randomElement(['Milik Sendiri', 'Sewa', 'Menumpang']),
            'luas_lantai' => $this->faker->numberBetween(20, 100),
            'jenis_lantai' => $this->faker->randomElement(['Keramik', 'Kayu', 'Semen']),
            'jenis_dinding' => $this->faker->randomElement(['Batu Bata', 'Kayu', 'Bambu']),
            'fasilitas_mck' => $this->faker->randomElement(['Ya', 'Tidak']),
            'fasilitas_ipal' => $this->faker->randomElement(['Ya', 'Tidak']),
            'fasilitas_energi_penerangan' => $this->faker->randomElement(['Listrik PLN', 'Genset', 'Lampu Minyak']),
            'fasilitas_air_minum' => $this->faker->randomElement(['PAM', 'Sumur', 'Air Kemasan']),
            'bahan_bakar' => $this->faker->randomElement(['Gas', 'Kayu', 'Listrik']),
            'kartu_jaminan_kesehatan' => $this->faker->randomElement(['Ada', 'Tidak Ada']),
            'kemampuan_berobat' => $this->faker->randomElement(['Tinggi', 'Sedang', 'Rendah']),
            'akses_informasi' => $this->faker->randomElement(['Internet', 'Televisi', 'Radio', 'Surat Kabar']),
        ];
    }
}
