<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Type extends Seeder
{
    static $name = 'types';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(self::$name)->insert([
            'commodity' => 1,
            'name' => 'Arabica',
            'description' => 'A species of flowering plant in the coffee and madder family Rubiaceae.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'commodity' => 1,
            'name' => 'Robusta',
            'description' => 'A species of coffee that has its origins in central and western sub-Saharan Africa.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'commodity' => 2,
            'name' => 'Pitaya Roja',
            'description' => 'Selenicereus costaricensis, synonym Hylocereus costaricensis, known as the Costa Rican pitahaya or Costa Rica nightblooming cactus, is a cactus species native to Costa Rica, Panama and Nicaragua.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'commodity' => 3,
            'name' => 'Coconut by-product',
            'description' => 'A by-product of coconut cultivation.',
            'created_at' => Carbon::now('UTC')
        ]);
    }
}
