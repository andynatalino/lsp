<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class jadwals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('jadwals', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_kategori')->unsigned();
          $table->string('nama_lsp');
          $table->string('tanggal_mulai');
          $table->string('tanggal_selesai');
          $table->string('waktu');
          $table->string('lokasi');
          $table->string('kuota');
          $table->string('biaya');
          $table->longtext('isi');
          $table->string('status');
          $table->string('slug');
          $table->string('image');
          $table->timestamps();

          // $table->foreign('id_category')->references('id')
          //         ->on('category_sp')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
}
