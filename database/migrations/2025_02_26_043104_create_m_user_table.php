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
        Schema::create('m_user', function (Blueprint $table) {
            $table->id('user_id');
            $table->String('username',10)->unique(); //unique untuk memastikan tidak ada username yang sama
            $table->String('nama',100);
            $table->String('password');
            $table->unsignedBigInteger('level_id')->index(); //Indexing untuk ForeinKey
            $table->timestamps();
            
            //mendefinisikan ForeignKey pd kolom level_id mengacu pada level_id di tabel m_level\
            $table->foreign('level_id')->references('level_id')->on('m_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_user');
    }
};