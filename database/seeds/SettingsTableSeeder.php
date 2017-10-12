<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('settings')->insert([    		
    		'nama_web' => 'Website',
    		'title' => 'Title',
    		'email' => 'Example@email.com',
    		'color_web' => 'blue',
    		'color_admin' => 'blue',
    		'color_operator' => 'blue',
    	]);
    }
}
