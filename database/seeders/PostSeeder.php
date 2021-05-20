<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('posts')->insert([
            'id' => rand(10,100),
            'title'=> $faker->sentence(5),
            'body'=> $faker->paragraph(4),
        ]);
    }
}
