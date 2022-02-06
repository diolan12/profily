<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class Spesification extends Seeder
{
    static $name = 'specifications';
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
                'product' => 1,
                'value' => 'Altitude : 1,500-1,800 M.asl',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 1,
                'value' => 'Moisture : 10-12%',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 1,
                'value' => 'Taste:',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 1,
                'value' => 'Defect: depends on the grade level',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 1,
                'value' => 'Beans: green beans, roast beans, powder',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 1,
                'value' => 'Acidity: medium',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 1,
                'value' => 'Grade: specialty, grade1, grade 2',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Arabica West Java
        DB::table(self::$name)->insert([
            [
                'product' => 2,
                'value' => 'Altitude : 1,500 M.asl',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 2,
                'value' => 'Moisture : 10-12%',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 2,
                'value' => 'Taste:',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 2,
                'value' => 'Defect: depends on the grade level',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 2,
                'value' => 'Beans: green beans, roast beans, powder',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 2,
                'value' => 'Acidity: high',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 2,
                'value' => 'Grade: specialty, grade1, grade 2',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Robusta Lampung
        DB::table(self::$name)->insert([
            [
                'product' => 9,
                'value' => 'Altitude : 800-1,500 M.asl',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 9,
                'value' => 'Moisture : 11-15%',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 9,
                'value' => 'Taste:',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 9,
                'value' => 'Defect: depends on the grade level',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 9,
                'value' => 'Beans: green beans, roast beans, powder',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 9,
                'value' => 'Acidity: medium',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 9,
                'value' => 'Grade: specialty, grade1, grade 2',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Pitaya Roja Dragon Fruit
        DB::table(self::$name)->insert([
            [
                'product' => 13,
                'value' => '100 % pure dragon fruit from Indonesian Plantations',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 13,
                'value' => 'Variety: <i>Pitaya Roja</i>',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 13,
                'value' => 'Weight: 300 - 800 grams per piece',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 13,
                'value' => 'Size:',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 13,
                'value' => 'Color: red skin and red flesh',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 13,
                'value' => 'Maturity: 70% - 90%',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 13,
                'value' => 'Packing: Vented Plastic Crete or Corrugated Cardboard Box:',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 13,
                'value' => 'Capacity: 5 - 20 kg per packaging',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 13,
                'value' => 'Load ability:',
                'created_at' => Carbon::now('UTC')
            ]
        ]);
    }
}
