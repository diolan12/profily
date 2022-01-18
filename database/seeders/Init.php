<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class Init extends Seeder
{
    static $name = 'configs';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // DB::table(self::$name)->insert([
        //     [
                
        //     ], [
                
        //     ], [
                
        //     ]
        // ]);
        DB::table(self::$name)->insert([
            'key' => 'web_brand_type',
            'val1' => 'logo',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'web_brand_text',
                'val1' => 'Chintia Coffee',
                'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'web_brand_logo',
                'val1' => 'logo-chintia.png',
                'val2' => 'Chintia Coffee Logo',
                'created_at' => Carbon::now('UTC')
        ]);
    }
}
