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

        // Arabica Bali Kintamani
        DB::table(self::$name)->insert([
            [
                'specification' => 17,
                'value' => 'Fruits',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 17,
                'value' => 'Soft flavor',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Arabica Gayo
        DB::table(self::$name)->insert([
            [
                'specification' => 24,
                'value' => 'Heavy taste',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 24,
                'value' => 'String flavor',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 24,
                'value' => 'Not to bitter',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Arabica Toraja
        DB::table(self::$name)->insert([
            [
                'specification' => 31,
                'value' => 'Fruity',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 31,
                'value' => 'Spices',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 31,
                'value' => 'Not to bitter',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Arabica Flores
        DB::table(self::$name)->insert([
            [
                'specification' => 38,
                'value' => 'Caramel',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 38,
                'value' => 'Hazelnut',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 38,
                'value' => 'Nacamid nuts',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 38,
                'value' => 'Strong flavor and scent',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Arabica Wamena
        DB::table(self::$name)->insert([
            [
                'specification' => 45,
                'value' => 'Medium sweetness',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 45,
                'value' => 'Earthy flavor',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 45,
                'value' => 'Sweet corn',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Arabica Ijen Raung
        DB::table(self::$name)->insert([
            [
                'specification' => 52,
                'value' => 'Sweet and juicy',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 52,
                'value' => 'Ginger',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 52,
                'value' => 'Tamarind',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Robusta Lampung
        DB::table(self::$name)->insert([
            [
                'specification' => 59,
                'value' => 'High flavor',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 59,
                'value' => 'Scent of spices & chocolate',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Robusta Temanggung
        DB::table(self::$name)->insert([
            [
                'specification' => 66,
                'value' => 'Bold flavor',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 66,
                'value' => 'Chocolate',
                'created_at' => Carbon::now('UTC')
            ]
        ]);
        
        // Robusta Dampit
        DB::table(self::$name)->insert([
            [
                'specification' => 73,
                'value' => 'Nutty',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 73,
                'value' => 'Chocolate',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 73,
                'value' => 'Bold flavor',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Robusta Ijen Raung
        DB::table(self::$name)->insert([
            [
                'specification' => 80,
                'value' => 'Earthy fresh nutty',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 80,
                'value' => 'Chocolate',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 80,
                'value' => 'Jasmine',
                'created_at' => Carbon::now('UTC')
            ]
        ]);
        
        // Pitaya Roja Dragon Fruit
        DB::table(self::$name)->insert([
            [
                'specification' => 88,
                'value' => 'Super 2 ( 300g - 500g )',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 88,
                'value' => 'Super 1 ( 500g - 600g )',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 88,
                'value' => 'Jumbo ( 700g - 800g )',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 88,
                'value' => 'Grade AAA ( Export Quality )',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 93,
                'value' => '20 feet (10 MT)',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'specification' => 93,
                'value' => '40 HC ( 20 MT )',
                'created_at' => Carbon::now('UTC')
            ]
        ]);
    }
}
