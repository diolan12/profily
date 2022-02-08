<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Role extends Seeder
{
    static $name = 'roles';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(self::$name)->insert([
            ['name' => 'Administrator'],
            ['name' => 'Founder']
        ]);
    }
}
