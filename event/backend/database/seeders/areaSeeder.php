<?php

namespace Database\Seeders;

use App\Models\area;
use Illuminate\Database\Seeder;

class areaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i < 4; $i++){
            area::create([
                'nama_area' => $faker->name,
                'luas_area' => rand(50,100),
                'slot_stand' => rand(2,50),
                'harga_sewa' => rand(1000000,5000000),
                'harga_buka_stand' => rand(100000,1000000),
                'status_area' => rand(0,1),
            ]);
        }
    }
}
