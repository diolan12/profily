<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class User extends Seeder
{
    static $name = 'users';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(self::$name)->insert([
            'role' => 1,
            'name' => 'Administrator',
            'email' => 'admin@permataagrindo.com',
            'password' => Hash::make('4dm1n15tr4t0r'),
            'created_at' => Carbon::now()
        ]);
        DB::table(self::$name)->insert([
            'name' => 'Sintya Pujayanti',
            'email' => 'chyntialaura@permataagrindo.com',
            'password' => Hash::make('Bismillah_123'),
            'created_at' => Carbon::now()
        ]);
    }
}
