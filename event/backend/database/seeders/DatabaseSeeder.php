<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(eventSeeder::class);
        $this->call(areaSeeder::class);
        $this->call(standSeeder::class);
    }
}
