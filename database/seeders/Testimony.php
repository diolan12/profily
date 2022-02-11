<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Testimony extends Seeder
{
    static $name = 'testimonies';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(self::$name)->insert([
            [
                'name' => 'Tharusa',
                'quote' => 'Good quality, safe packing until here and fast response, it\'s recommended seller.',
                'country' => 'Srilanka',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Amin',
                'quote' => 'Fast delivery, delicious and classy flavor. Thank you seller.',
                'country' => 'Pakistan',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Dzika',
                'quote' => 'The quality of the coffee is unquestionable.',
                'country' => 'Indonesia',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
