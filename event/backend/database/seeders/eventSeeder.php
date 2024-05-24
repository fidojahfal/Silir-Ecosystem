<?php

namespace Database\Seeders;

use App\Models\event;
use Illuminate\Database\Seeder;

class eventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i < 10; $i++){
            event::create([
                'nama_event' => $faker->sentence,
                'penyelenggara' => $faker->name,
                'deskripsi_event' => $faker->sentence,
                'biaya_masuk' => rand(10000, 70000),
                'waktu_start' => $faker->date(),
                'waktu_end' => $faker->date(),
                'banner_event'=> null,
                'status_event' => 0,
                'email' => 'nawaf@mail',
            ]);
        }
    }
}
