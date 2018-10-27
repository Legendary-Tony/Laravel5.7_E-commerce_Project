<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$password =  bcrypt(123456);
        User::create([
        	'name' => 'Legendary',
        	'email' => 'excellentloaded@gmail.com',
        	'password' => $password
        ]);
    }
}
