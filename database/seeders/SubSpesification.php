<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubSpesification extends Seeder
{
    static $name = 'sub_specifications';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Arabica Sumatra Mandheling
        DB::table(self::$name)->insert([
            [
                'specification' => 3,
                'value' => 'Spicy herbs',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 3,
                'value' => 'Slightly mouthfeel',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Arabica West Java
        DB::table(self::$name)->insert([
            [
                'specification' => 10,
                'value' => 'Sweet',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 10,
                'value' => 'Caramel',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Robusta Lampung
        DB::table(self::$name)->insert([
            [
                'specification' => 17,
                'value' => 'High flavour',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 17,
                'value' => 'Scent of spices & chocolate',
                'created_at' => Carbon::now('UTC')
            ]
        ]);
        
        // Pitaya Roja Dragon Fruit
        DB::table(self::$name)->insert([
            [
                'specification' => 25,
                'value' => 'Super 2 ( 300g - 500g )',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 25,
                'value' => 'Super 1 ( 500g - 600g )',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 25,
                'value' => 'Jumbo ( 700g - 800g )',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 25,
                'value' => 'Grade AAA ( Export Quality )',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 30,
                'value' => '20 feet (10 MT)',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 30,
                'value' => '40 HC ( 20 MT )',
                'created_at' => Carbon::now('UTC')
            ]
        ]);
    }
}
