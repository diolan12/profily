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
            'name' => 'Dio Lantief Widoyoko',
            'email' => 'dio_lantief21@outlook.com',
            'password' => Hash::make('12345678'),
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'name' => 'Sintya Pujayanti',
            'email' => 'chintia@permataagrindo.com',
            'password' => Hash::make('12345678'),
            'created_at' => Carbon::now('UTC')
        ]);
    }
}
