<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table("users")->insert([
            [
                "id"=> 1,
                "name" => "admin",
                "email" => "admin0@gmail.com",
                "password" => '$2y$12$NI53UtJbTcE2z92X2k9vP.mYBAW2.DXl6wtOzvQTgl6x8bsAJ8TVu'
            ],
        ]);
    }
}
