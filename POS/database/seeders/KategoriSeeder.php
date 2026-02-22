<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_kode' => 'MIN',
                'kategori_nama' => 'Minuman',
            ],
            [
                'kategori_kode' => 'MKN',
                'kategori_nama' => 'Makanan',
            ],
            [
                'kategori_kode' => 'SNK',
                'kategori_nama' => 'Snack',
            ],
            [
                'kategori_kode' => 'ALN',
                'kategori_nama' => 'Alat Tulis',
            ],
            [
                'kategori_kode' => 'PRL',
                'kategori_nama' => 'Perlengkapan Rumah',
            ],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
