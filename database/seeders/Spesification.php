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
                'value' => 'Altitude: 1,500-1,800 M.asl',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 1,
                'value' => 'Moisture: 10-12%',
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
                'value' => 'Grade: specialty, grade 1, grade 2',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Arabica West Java
        DB::table(self::$name)->insert([
            [
                'product' => 2,
                'value' => 'Altitude: 1,500 M.asl',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 2,
                'value' => 'Moisture: 10-12%',
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
                'value' => 'Grade: specialty, grade 1, grade 2',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Arabica Bali Kintamani
        DB::table(self::$name)->insert([
            [
                'product' => 3,
                'value' => 'Altitude: 900 M.asl',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 3,
                'value' => 'Moisture: 12-14%',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 3,
                'value' => 'Taste:',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 3,
                'value' => 'Defect: depends on the grade level',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 3,
                'value' => 'Beans: green beans, roast beans, powder',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 3,
                'value' => 'Acidity: medium',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 3,
                'value' => 'Grade: specialty, grade 1, grade 2',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Arabica Gayo
        DB::table(self::$name)->insert([
            [
                'product' => 4,
                'value' => 'Altitude: 1,000-1,700 M.asl',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 4,
                'value' => 'Moisture: 11-15%',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 4,
                'value' => 'Taste:',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 4,
                'value' => 'Defect: depends on the grade level',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 4,
                'value' => 'Beans: green beans, roast beans, powder',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 4,
                'value' => 'Acidity: low',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 4,
                'value' => 'Grade: specialty, grade 1, grade 2',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Arabica Toraja
        DB::table(self::$name)->insert([
            [
                'product' => 5,
                'value' => 'Altitude: 1,400-2,100 M.asl',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 5,
                'value' => 'Moisture: 12-15%',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 5,
                'value' => 'Taste:',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 5,
                'value' => 'Defect: depends on the grade level',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 5,
                'value' => 'Beans: green beans, roast beans, powder',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 5,
                'value' => 'Acidity: low',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 5,
                'value' => 'Grade: specialty, grade 1, grade 2',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Arabica Flores
        DB::table(self::$name)->insert([
            [
                'product' => 6,
                'value' => 'Altitude: 1,000-1,500 M.asl',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 6,
                'value' => 'Moisture: 12-15%',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 6,
                'value' => 'Taste:',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 6,
                'value' => 'Defect: depends on the grade level',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 6,
                'value' => 'Beans: green beans, roast beans, powder',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 6,
                'value' => 'Acidity: medium',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 6,
                'value' => 'Grade: specialty, grade 1, grade 2',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Arabica Wamena
        DB::table(self::$name)->insert([
            [
                'product' => 7,
                'value' => 'Altitude: 1,200-1,600 M.asl',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 7,
                'value' => 'Moisture: 15%',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 7,
                'value' => 'Taste:',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 7,
                'value' => 'Defect: depends on the grade level',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 7,
                'value' => 'Beans: green beans, roast beans, powder',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 7,
                'value' => 'Acidity: low',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 7,
                'value' => 'Grade: specialty, grade 1, grade 2',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Arabica Ijen Raung
        DB::table(self::$name)->insert([
            [
                'product' => 8,
                'value' => 'Altitude: 1,400-1,800 M.asl',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 8,
                'value' => 'Moisture: 12-15%',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 8,
                'value' => 'Taste:',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 8,
                'value' => 'Defect: depends on the grade level',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 8,
                'value' => 'Beans: green beans, roast beans, powder',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 8,
                'value' => 'Acidity: low',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 8,
                'value' => 'Grade: specialty, grade 1, grade 2',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Robusta Lampung
        DB::table(self::$name)->insert([
            [
                'product' => 9,
                'value' => 'Altitude: 800-1,500 M.asl',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 9,
                'value' => 'Moisture: 11-15%',
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

        // Robusta Temanggung
        DB::table(self::$name)->insert([
            [
                'product' => 10,
                'value' => 'Altitude: 400-800 M.asl',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 10,
                'value' => 'Moisture: 12-15%',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 10,
                'value' => 'Taste:',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 10,
                'value' => 'Defect: depends on the grade level',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 10,
                'value' => 'Beans: green beans, roast beans, powder',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 10,
                'value' => 'Acidity: low',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 10,
                'value' => 'Grade: specialty, grade 1, grade 2',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Robusta Dampit
        DB::table(self::$name)->insert([
            [
                'product' => 11,
                'value' => 'Altitude: 700-800 M.asl',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 11,
                'value' => 'Moisture: 11-13%',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 11,
                'value' => 'Taste:',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 11,
                'value' => 'Defect: depends on the grade level',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 11,
                'value' => 'Beans: green beans, roast beans, powder',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 11,
                'value' => 'Acidity: low',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 11,
                'value' => 'Grade: specialty, grade 1, grade 2',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Robusta Ijen Raung 
        DB::table(self::$name)->insert([
            [
                'product' => 12,
                'value' => 'Altitude: 1,400-1,800 M.asl',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 12,
                'value' => 'Moisture: 12-15%',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 12,
                'value' => 'Taste:',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 12,
                'value' => 'Defect: depends on the grade level',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 12,
                'value' => 'Beans: green beans, roast beans, powder',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 12,
                'value' => 'Acidity: medium',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 12,
                'value' => 'Grade: specialty, grade 1, grade 2',
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

        // Cocopeat Block
        DB::table(self::$name)->insert([
            [
                'product' => 14,
                'value' => 'Size: 30 X 30 X 12 - 15 cm',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 14,
                'value' => 'Weight: 5 kilograms',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 14,
                'value' => 'Color: brown',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 14,
                'value' => 'Ec: < 0.5ms/cm',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 14,
                'value' => 'Ph: 5.0-7.0',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 14,
                'value' => 'Moisture: < 25%',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 14,
                'value' => 'Short fiber content: < 10% (2 mm)',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 14,
                'value' => 'Contamination control: non-sand, stone, coco shell - fragment',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 14,
                'value' => 'Drying: sun drying',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 14,
                'value' => 'Packing: palletized with shrink film',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 14,
                'value' => 'Certificate: quality analysis, fumigatron, phytosanitary',
                'created_at' => Carbon::now('UTC')
            ]
        ]);

        // Coconut Fiber
        DB::table(self::$name)->insert([
            [
                'product' => 15,
                'value' => 'Cleaned and pressed',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 15,
                'value' => 'Dimension: 115 x 85 x 40',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 15,
                'value' => 'Weight: 90 - 110 kilograms per ball',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 15,
                'value' => 'Moisture: 18-20%',
                'created_at' => Carbon::now('UTC')
            ],
            [
                'product' => 15,
                'value' => 'Fiber: 10 cm up',
                'created_at' => Carbon::now('UTC')
            ]
        ]);
    }
}
