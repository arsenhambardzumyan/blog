<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!DB::table('blog_categories')->where('name','test1')->first()) {
          DB::table('blog_categories')->insert([
            'name' => 'test1_category',
            'status' => 1,
            'ordering' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
          ]);
        }
        if(!DB::table('blog_categories')->where('name','test2')->first()) {
          DB::table('blog_categories')->insert([
            'name' => 'test2_category',
            'status' => 1,
            'ordering' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
          ]);
        }
        if(!DB::table('blog_categories')->where('name','test3')->first()) {
          DB::table('blog_categories')->insert([
            'name' => 'test3_category',
            'status' => 1,
            'ordering' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
          ]);
        }
    }
}
