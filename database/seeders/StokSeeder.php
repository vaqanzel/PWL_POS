<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StokSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk tabel t_stok.
     */
    public function run()
    {
        $data = [
            ['stock_id' => 1, 'supplier_id' => 1, 'barang_id' => 1, 'user_id' => 1, 'stock_tanggal' => '2025-01-01', 'stock_jumlah' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stock_id' => 2, 'supplier_id' => 1, 'barang_id' => 2, 'user_id' => 1, 'stock_tanggal' => '2025-01-01', 'stock_jumlah' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stock_id' => 3, 'supplier_id' => 1, 'barang_id' => 3, 'user_id' => 1, 'stock_tanggal' => '2025-01-01', 'stock_jumlah' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stock_id' => 4, 'supplier_id' => 2, 'barang_id' => 4, 'user_id' => 1, 'stock_tanggal' => '2025-01-02', 'stock_jumlah' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stock_id' => 5, 'supplier_id' => 2, 'barang_id' => 5, 'user_id' => 1, 'stock_tanggal' => '2025-01-02', 'stock_jumlah' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stock_id' => 6, 'supplier_id' => 2, 'barang_id' => 6, 'user_id' => 1, 'stock_tanggal' => '2025-01-02', 'stock_jumlah' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stock_id' => 7, 'supplier_id' => 2, 'barang_id' => 7, 'user_id' => 1, 'stock_tanggal' => '2025-01-02', 'stock_jumlah' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stock_id' => 8, 'supplier_id' => 2, 'barang_id' => 8, 'user_id' => 1, 'stock_tanggal' => '2025-01-02', 'stock_jumlah' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stock_id' => 9, 'supplier_id' => 2, 'barang_id' => 9, 'user_id' => 1, 'stock_tanggal' => '2025-01-02', 'stock_jumlah' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stock_id' => 10, 'supplier_id' => 3, 'barang_id' => 10, 'user_id' => 1, 'stock_tanggal' => '2025-01-01', 'stock_jumlah' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stock_id' => 11, 'supplier_id' => 3, 'barang_id' => 11, 'user_id' => 1, 'stock_tanggal' => '2025-01-01', 'stock_jumlah' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stock_id' => 12, 'supplier_id' => 3, 'barang_id' => 12, 'user_id' => 1, 'stock_tanggal' => '2025-01-01', 'stock_jumlah' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stock_id' => 13, 'supplier_id' => 3, 'barang_id' => 13, 'user_id' => 1, 'stock_tanggal' => '2025-01-03', 'stock_jumlah' => 10, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['stock_id' => 14, 'supplier_id' => 3, 'barang_id' => 14, 'user_id' => 1, 'stock_tanggal' => '2025-01-03', 'stock_jumlah' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('t_stok')->insert($data);
    }
}
