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
            ['kategori_id' => 1, 'kategori_kode' => 'K01', 'kategori_nama' => 'Kategori 1'],
            ['kategori_id' => 2, 'kategori_kode' => 'K02', 'kategori_nama' => 'Kategori 2'],
            ['kategori_id' => 3, 'kategori_kode' => 'K03', 'kategori_nama' => 'Kategori 3'],
            ['kategori_id' => 4, 'kategori_kode' => 'K04', 'kategori_nama' => 'Kategori 4'],
            ['kategori_id' => 5, 'kategori_kode' => 'K05', 'kategori_nama' => 'Kategori 5'],
        ];
        
        DB::table(table: 'm_kategori')->insert(values: $data);
    }
}
