<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([    		
    		'number' => '1234567890',
    		'username' => 'admin',
    		'name' => 'admin',
    		'email' => 'admin@admin.com',
    		'password' => '$2y$10$FvVAHgbKxm226r94HUFIDuvZeWx6ddCHkcA032Eeq.lPfT7oZoedu',   
    		'role' => '2',
    	]);
    }
}
