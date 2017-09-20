<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;


class JadwalsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $faker = Faker::create();
    foreach (range(1,100) as $index) {
      DB::table('jadwals')->insert([
        'id_kategori' => 1  ,
        'nama_lsp' => $faker->name,
        'tanggal_mulai' => $faker->name,
        'tanggal_selesai' => $faker->name,
        'waktu' => $faker->email,
        'lokasi' => $faker->email,
        'kuota' => $faker->email,
        'biaya' => $faker->name,
        'isi' => $faker->name,
        'status' => $faker->name,
        'slug' => $faker->name,
        'image' => $faker->name,
      ]);
    }
  }
}
