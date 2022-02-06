<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            Init::class,
            Commodity::class,
            Type::class,
            Product::class,
            Spesification::class,
            SubSpesification::class,
            Image::class,
        ]);
    }
}
