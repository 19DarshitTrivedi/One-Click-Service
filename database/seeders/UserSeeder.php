<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            "name"=>"admin",
            "phone"=>"9823546655",
            "email"=>"admin@gmail.com",
            "password"=>"admin@123",
            "address"=>"near kamnath",
            "city"=>"Rajkot",
            "state"=>"Gujarat",
            "pin_code"=>"360001",
            "role"=>"admin",
        ]);
    }
}
