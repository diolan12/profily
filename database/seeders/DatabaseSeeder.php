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
            Role::class,
            Init::class,
            Commodity::class,
            Type::class,
            Product::class,
            Spesification::class,
            SubSpesification::class,
            Image::class,
            User::class,
            Testimony::class,
            // DummyStat::class // comment on production
        ]);
    }
}
