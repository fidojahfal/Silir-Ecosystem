<?php

namespace Database\Seeders;

use App\Models\stand;
use Illuminate\Database\Seeder;

class standSeeder extends Seeder
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
            stand::create([
                'nama_stand' => $faker->sentence,
                'deskripsi_stand' => $faker->sentence,
                'id_area' => rand(1, 4),
                'foto_stand'=> null,
                'status_stand' => rand(0,1),
                'email' => 'nawaf@mail',
            ]);
        }
    }
}
