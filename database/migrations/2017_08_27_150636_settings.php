<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Settings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('settings', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nama_web');
        $table->string('title');
        $table->string('email');          
        $table->string('color_web');
        $table->string('color_admin');
        $table->string('color_operator');
        $table->string('facebook');
        $table->string('logo');
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
      Schema::dropIfExists('settings');
  }
}
