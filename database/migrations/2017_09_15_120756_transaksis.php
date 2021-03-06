<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transaksis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('transaksis', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('id_user')->unsigned()->nullable();
        $table->integer('id_jadwal')->unsigned()->nullable();
        $table->integer('id_pembayaran')->unsigned()->nullable();
        $table->datetime('tanggal_konfirmasi')->nullable();
        $table->datetime('tanggal_transaksi')->nullable();
        $table->string('photo_bukti')->nullable();
        $table->string('tipe')->nullable();
        $table->integer('status')->default(1)->nullable();
        $table->timestamps();

        $table->foreign('id_user')->references('id')
        ->on('users')->onDelete('no action');
        $table->foreign('id_jadwal')->references('id')
        ->on('jadwals')->onDelete('no action');
       /** $table->foreign('id_pembayaran')->references('id')
        ->on('pembayarans')->onDelete('no action'); */
    });
      DB::update("ALTER TABLE transaksis AUTO_INCREMENT = 1000;");
  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('transaksis');
  }
}
