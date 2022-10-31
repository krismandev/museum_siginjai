<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTentangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tentang', function (Blueprint $table) {
            $table->id();
            $table->string('nama',25);
            $table->string('kota',25);
            $table->string('kode_pos',25);
            $table->string('lokasi',100);
            $table->string('gambar',100)->nullable();
            $table->text('profil')->nullable();
            $table->text('sejarah')->nullable();
            $table->text('struktur_organisasi')->nullable();
            $table->text('visi_misi')->nullable();
            $table->text('tugas_dan_fungsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tentang');
    }
}
