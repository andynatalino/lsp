<?php

use Illuminate\Database\Seeder;

class TentangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    	
    	DB::table('tentangs')->insert([    		
    		'tentang' => '<p>Tentang Perusahaan</p>',
    	]);
    }
}
