<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_kode' => 'BRG001',
                'barang_nama' => 'Indomie Goreng',
                'kategori_id' => 2,
                'harga_beli' => 2000,
                'harga_jual' => 3000,
            ],
            [
                'barang_kode' => 'BRG002',
                'barang_nama' => 'Teh Botol Sosro',
                'kategori_id' => 1,
                'harga_beli' => 3000,
                'harga_jual' => 5000,
            ],
            [
                'barang_kode' => 'BRG003',
                'barang_nama' => 'Chitato',
                'kategori_id' => 3,
                'harga_beli' => 5000,
                'harga_jual' => 8000,
            ],
             [
                'barang_kode' => 'BRG004',
                'barang_nama' => 'Pensil 2B',
                'kategori_id' => 4,
                'harga_beli' => 1000,
                'harga_jual' => 2000,
            ],
             [
                'barang_kode' => 'BRG005',
                'barang_nama' => 'Sapu Lidi',
                'kategori_id' => 5,
                'harga_beli' => 15000,
                'harga_jual' => 25000,
            ],
            [
                'barang_kode' => 'BRG006',
                'barang_nama' => 'Buku Tulis',
                'kategori_id' => 4,
                'harga_beli' => 3000,
                'harga_jual' => 5000,
            ],
            [
                'barang_kode' => 'BRG007',
                'barang_nama' => 'Susu UHT',
                'kategori_id' => 1,
                'harga_beli' => 4000,
                'harga_jual' => 6000,
            ],
            [
                'barang_kode' => 'BRG008',
                'barang_nama' => 'Roti Tawar',
                'kategori_id' => 2,
                'harga_beli' => 5000,
                'harga_jual' => 7000,
            ],
            [
                'barang_kode' => 'BRG009',
                'barang_nama' => 'Kopi Instan',
                'kategori_id' => 1,
                'harga_beli' => 6000,
                'harga_jual' => 9000,
            ],
            [
                'barang_kode' => 'BRG010',
                'barang_nama' => 'Sikat Gigi',
                'kategori_id' => 5,
                'harga_beli' => 8000,
                'harga_jual' => 12000,
            ]
                


        ];
        DB::table('m_barang')->insert($data);
    }
}
