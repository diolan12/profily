<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DummyStat extends Seeder
{
    static $visit = 'visitors';
    static $view = 'views';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visitMax = 300;
        $viewMax = 800;
        
        $views = [];
        $productIDs = range(1, 15);

        // Product Views Daily
        // foreach ($productIDs as $productID) {
        //     $views[] = [
        //         'product' => $productID,
        //         'count' => rand(1, 50),
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ];
        // }

        $visitors = [];
        $months = range(1, 12);
        foreach ($months as $month) {
            $dayThisMonth = cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
            $dates = range(1, $dayThisMonth);
            foreach ($dates as $date) {
                $carbonThisYear = Carbon::create(date('Y'), $month, $date, rand(0, 23), rand(0, 59), rand(0, 59));

                // Visitor Count
                $visitors[] = [
                    'count' => rand(1, $visitMax),
                    'created_at' => $carbonThisYear,
                    'updated_at' => $carbonThisYear
                ];

                // Product Views
                foreach ($productIDs as $productID) {
                    $views[] = [
                        'product' => $productID,
                        'count' => rand(1, $viewMax),
                        'created_at' => $carbonThisYear,
                        'updated_at' => $carbonThisYear
                    ];
                }
            }
        }

        DB::table(self::$view)->insert($views);
        DB::table(self::$visit)->insert($visitors);
    }
}
