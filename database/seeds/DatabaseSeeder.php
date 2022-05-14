<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'login' => "ksaparov",
                'name' => "Kakajan",
                'surname' => "Saparow",
                'middlename' => "Döwletmyradowiç",
                'birthday' => "2000-06-29",
                'phone' => "62615930",
                'address' => 'Hudayberdiyew',
                'email' => "saparovkakajandov06@gmail.com",
                'email_verified_at' => "2020-05-20 17:29:00",
                'password' => '$2y$10$WfKG.H5L7uZsezhPkR/qJuv/.nYFeV7f4jgD8Z/KVW1BLrRjo5N.C',
                'role' => 'admin',
                'remember_token' => NULL,
                'created_at' => "2020-05-20 17:29:00",
                'updated_at' => "2020-05-20 17:29:00",
                'work' => NULL,
            ]
        ]);


    }
}
