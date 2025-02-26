<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    public function run()
    {
        DB::table('t_penjualan')->insert([
            ['penjualan_id' => 1, 'user_id' => 1, 'penjualan_kode' => 'PJ001', 'pembeli' => 'Budi', 'penjualan_tanggal' => '2025-02-01', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 2, 'user_id' => 1, 'penjualan_kode' => 'PJ002', 'pembeli' => 'Siti', 'penjualan_tanggal' => '2025-02-02', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 3, 'user_id' => 2, 'penjualan_kode' => 'PJ003', 'pembeli' => 'Andi', 'penjualan_tanggal' => '2025-02-03', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 4, 'user_id' => 2, 'penjualan_kode' => 'PJ004', 'pembeli' => 'Rina', 'penjualan_tanggal' => '2025-02-04', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 5, 'user_id' => 3, 'penjualan_kode' => 'PJ005', 'pembeli' => 'Dodi', 'penjualan_tanggal' => '2025-02-05', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 6, 'user_id' => 3, 'penjualan_kode' => 'PJ006', 'pembeli' => 'Ani', 'penjualan_tanggal' => '2025-02-06', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 7, 'user_id' => 1, 'penjualan_kode' => 'PJ007', 'pembeli' => 'Joko', 'penjualan_tanggal' => '2025-02-07', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 8, 'user_id' => 2, 'penjualan_kode' => 'PJ008', 'pembeli' => 'Nina', 'penjualan_tanggal' => '2025-02-08', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 9, 'user_id' => 3, 'penjualan_kode' => 'PJ009', 'pembeli' => 'Yudi', 'penjualan_tanggal' => '2025-02-09', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['penjualan_id' => 10, 'user_id' => 1, 'penjualan_kode' => 'PJ010', 'pembeli' => 'Lisa', 'penjualan_tanggal' => '2025-02-10', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
