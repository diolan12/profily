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
        // Logo
        DB::table(self::$name)->insert([
            'key' => 'brand_type',
            'type' => 'web',
            'val1' => 'text',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'brand_text',
            'type' => 'web',
            'val1' => 'Permata Agrindo',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'brand_logo',
            'type' => 'web',
            'val1' => 'logo-chintia.png',
            'val2' => 'Chintia Coffee Logo',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'brand_slogan',
            'type' => 'web',
            'val1' => 'Best exporter in the world and promote Indonesian agriculture',
            'created_at' => Carbon::now('UTC')
        ]);

        // Brand Color
        DB::table(self::$name)->insert([
            'key' => 'primary',
            'type' => 'color',
            'val1' => 'green',
            'val2' => 'darken-1',
            'val3' => '#43a047',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'secondary',
            'type' => 'color',
            'val1' => 'green',
            'val2' => 'darken-3',
            'val3' => '#2e7d32',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'accent',
            'type' => 'color',
            'val1' => 'green',
            'val2' => 'accent-4',
            'val3' => '#00c853',
            'created_at' => Carbon::now('UTC')
        ]);

        // General
        DB::table(self::$name)->insert([
            'key' => 'information',
            'type' => 'brand',
            'val1' => 'Permata Agrindo',
            'val2' => 'PT Permata Agrindo',
            'val3' => 'Banyuwangi, East Java, Indonesia',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'slogan',
            'type' => 'brand',
            'val1' => 'Best exporter in the world and promote Indonesian agriculture',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'about',
            'type' => 'brand',
            'val1' => 'Permata Agrindo is engaged in general supplier, general trading, and distributor as well as cultivation in agriculture. We partner with Indonesian farmers to produce the highest quality products. We can be sure that our products are of superior quality.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'vision',
            'type' => 'brand',
            'val1' => 'We envisioned to become the best exporter in the world and promote Indonesian agriculture.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'mission_icon',
            'type' => 'brand',
            'val1' => 'lightbulb',
            'val2' => 'star_rate',
            'val3' => 'group',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'mission_title',
            'type' => 'brand',
            'val1' => 'Innovation',
            'val2' => 'Quality',
            'val3' => 'Partnership',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'mission_text',
            'type' => 'brand',
            'val1' => 'Helping Indonesian farmers to become innovative farmers.',
            'val2' => 'Strategies for innovation in-stock availability and producing the best quality products from Indonesian farmers.',
            'val3' => 'Build strategic business partners with buyers, farmers, and the government in the long term.',
            'created_at' => Carbon::now('UTC')
        ]);

        // Connect val1 only [email, phone, link]
        DB::table(self::$name)->insert([
            'key' => 'connect_email',
            'type' => 'connect',
            'val1' => 'email',
            'val2' => 'permata.agrindo@gmail.com',
            'val3' => 'permata.agrindo@gmail.com',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'connect_phone',
            'type' => 'connect',
            'val1' => 'phone',
            'val2' => '+62 83-852-153-846',
            'val3' => '+62 83-852-153-846',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'connect_whatsapp',
            'type' => 'connect',
            'val1' => 'link',
            'val2' => 'https://wa.me/6283852153846',
            'val3' => 'Whatsapp',
            'created_at' => Carbon::now('UTC')
        ]);
    }
}
