<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 3,
                'pembeli' => 'John Doe',
                'penjualan_kode' => 'PNJ001',
                'penjualan_tanggal' => '2026-04-10',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Jane Smith',
                'penjualan_kode' => 'PNJ002',
                'penjualan_tanggal' => '2026-04-11',
            ],
             [
                'user_id' => 3,
                'pembeli' => 'Alice Johnson',
                'penjualan_kode' => 'PNJ003',
                'penjualan_tanggal' => '2026-04-12',
            ],
             [
                'user_id' => 3,
                'pembeli' => 'Bob Brown',
                'penjualan_kode' => 'PNJ004',
                'penjualan_tanggal' => '2026-04-13',
            ],
             [
                'user_id' => 3,
                'pembeli' => 'Charlie Davis',
                'penjualan_kode' => 'PNJ005',
                'penjualan_tanggal' => '2026-04-14',
            ],
             [
                'user_id' => 3,
                'pembeli' => 'David Wilson',
                'penjualan_kode' => 'PNJ006',
                'penjualan_tanggal' => '2026-04-15',
            ],
             [
                'user_id' => 3,
                'pembeli' => 'Eve Miller',
                'penjualan_kode' => 'PNJ007',
                'penjualan_tanggal' => '2026-04-16',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Frank Anderson',
                'penjualan_kode' => 'PNJ008',
                'penjualan_tanggal' => '2026-04-17',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Grace Lee',
                'penjualan_kode' => 'PNJ009',
                'penjualan_tanggal' => '2026-04-18',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Hank Taylor',
                'penjualan_kode' => 'PNJ010',
                'penjualan_tanggal' => '2026-04-19',
            ]
        ];
        DB::table('t_penjualan')->insert($data);

    }
}
