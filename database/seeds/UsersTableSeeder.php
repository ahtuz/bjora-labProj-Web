<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seeder for users table
        DB::table('users')->insert([
    		[
	            'username' => "MiyakoIzumo",
                'email' => "miyakoizumo@email.com",
                'password' => Hash::make('MiyakoIzumo'),
                'gender' => "Female",
                'address' => "Diabolos St.",
                'birthday' => "2004-01-23",
                'profile_picture' => "MiyakoIzumo.png",
                'created_at' => "2019-11-19 02:34:20",
				'updated_at' => "2019-11-19 02:34:20",
            ],
            [
	            'username' => "OnishimaHomare",
                'email' => "onishimahomare@email.com",
                'password' => Hash::make('OnishimaHomare'),
                'gender' => "Female",
                'address' => "Deserted Island St.",
                'birthday' => "2001-06-27",
                'profile_picture' => "OnishimaHomare.jpg",
                'created_at' => "2019-11-19 02:34:20",
				'updated_at' => "2019-11-19 02:34:20",
            ],
            [
	            'username' => "BaeSuzy",
                'email' => "baesuzy@email.com",
                'password' => Hash::make('BaeSuzy'),
                'gender' => "Female",
                'address' => "Seoul St.",
                'birthday' => "1994-10-10",
                'profile_picture' => "BaeSuzy.jpg",
                'created_at' => "2019-11-19 02:34:20",
				'updated_at' => "2019-11-19 02:34:20",
	        ],
        ]);
    }
}
