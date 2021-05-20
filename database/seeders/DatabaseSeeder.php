<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Sheriff Sonko',
            'email' => 'safsonko1@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('sheriff123'),
            'remember_token' => Str::random(10),
            'created_at' => $this->faker->dateTimeBetween('-6 month','+1 month')
        ]);
        \App\Models\User::factory(50)->create();
        
        // $this->call([
        //     PostSeeder::class,
        // ]);
    }
}
