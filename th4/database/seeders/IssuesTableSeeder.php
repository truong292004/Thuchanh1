<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        
        
        foreach (range(1, 50) as $index) {
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1,50),
                'reported_by' => $faker->name,
                'reported_date' => $faker->date(), // Thời gian ngẫu nhiên trong vòng 1 năm qua
                'description' => $faker->sentence(20), // Mô tả ngẫu nhiên với 10 từ
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']), // Mức độ ưu tiên
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']), // Trạng thái sự cố
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
