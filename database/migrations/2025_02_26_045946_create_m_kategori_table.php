<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('m_kategori', function (Blueprint $table) {
            Schema::create('m_kategori', function (Blueprint $table) {
                $table->id('kategori_id');
                $table->String('kategori_kode',10)->unique();
                $table->String('kategori_nama',100);
                $table->timestamps();
            });
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_kategori', function (Blueprint $table) {
            //
        });
    }
};
