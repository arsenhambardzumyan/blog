<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!DB::table('blogs')->where('title','test1')->first()) {
          DB::table('blogs')->insert([
            'title' => 'test1',
            'slug' => 'test1',
            'status' => 1,
            'description' => '',
            'ordering' => 1,
            'blog_category_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
          ]);
        }
        if(!DB::table('blogs')->where('title','test2')->first()) {
          DB::table('blogs')->insert([
            'title' => 'test2',
            'slug' => 'test2',
            'status' => 1,
            'description' => '',
            'ordering' => 2,
            'blog_category_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

          ]);
        }
        if(!DB::table('blogs')->where('title','test3')->first()) {
          DB::table('blogs')->insert([
            'title' => 'test3',
            'slug' => 'test3',
            'status' => 1,
            'description' => '',
            'ordering' => 3,
            'blog_category_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
          ]);
        }
    }
}
