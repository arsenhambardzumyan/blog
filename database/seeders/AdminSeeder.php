<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!DB::table('admins')->where('email','admin@gmail.com')->first()) {
          DB::table('admins')->insert([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'status' => 1
        ]);
      }
    }
}
