<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userdatas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_transaksi')->unsigned()->nullable();
            $table->string('pendidikan_terakhir');
            $table->string('nama');
            $table->string('jurusan');
            $table->string('nama_perusahaan');
            $table->string('alamat_perusahaan');
            $table->string('jabatan');
            $table->string('email_perusahaan');
            $table->timestamps();

            $table->foreign('id_transaksi')->references('id')
            ->on('transaksis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userdatas');
    }
}
