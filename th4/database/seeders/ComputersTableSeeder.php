<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach(range(1,50)as $index)
        {
            DB::table('computers')->insert([
                'computer_name' => $faker->word . '-' . $faker->randomNumber(3),      
                'model' => $faker->randomElement(['Dell Optiplex 7090', 'HP EliteDesk 800', 'Lenovo ThinkCentre M720', 'Asus VivoPC']),
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Windows 11 Pro', 'Ubuntu 20.04', 'macOS Big Sur']),
                'processor' => $faker->randomElement(['Intel Core i5-11400', 'Intel Core i7-11700', 'AMD Ryzen 5 5600X', 'AMD Ryzen 7 5800X']),
                'memory' => $faker->randomElement([8, 16, 32, 64]),    
                'available' => $faker->boolean(),    
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        };
    }
}
