<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoleksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koleksi', function (Blueprint $table) {
            $table->string("no_jenis",25);
            $table->string("no_koleksi",25);
            $table->string("nama_koleksi",100);
            $table->string("no_registrasi",25)->nullable();
            $table->string("gambar",100)->nullable();
            $table->string("asal_perolehan",100)->nullable();
            $table->date("tanggal_perolehan")->nullable();
            $table->string("tempat_pembuatan",100)->nullable();
            $table->string("tempat_penyimpanan",100)->nullable();
            $table->string("ukuran",255)->nullable();
            $table->text("deskripsi")->nullable();
            $table->string("kurator",255)->nullable();
            $table->date("tanggal")->nullable();
            $table->unsignedBigInteger("user_id");
            $table->timestamps();

            $table->primary(['no_jenis', 'no_koleksi']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('koleksi');
    }
}
