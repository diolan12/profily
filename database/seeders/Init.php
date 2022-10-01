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
            'val1' => 'logo',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'brand_logo',
            'type' => 'web',
            'val1' => 'logo-long-light.png',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'banner',
            'type' => 'web',
            'val1' => 'banner.jpg',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'style',
            'type' => 'web',
            'val1' => 'white-text', // text color
            'val2' => 'text-lighten-4', // text color modifier
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'action',
            'type' => 'web',
            'val1' => 'Contact US',
            'val2' => 'https://wa.me/6283852153846',
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
        DB::table(self::$name)->insert([
            'key' => 'background',
            'type' => 'color',
            'val1' => 'green',
            'val2' => 'lighten-4',
            'val3' => '#00c853',
            'created_at' => Carbon::now('UTC')
        ]);

        // Parallax
        DB::table(self::$name)->insert([
            'key' => 'product',
            'type' => 'parallax',
            'val1' => 'parallax-beans.jpg',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'shipping',
            'type' => 'parallax',
            'val1' => 'parallax-shipping.jpg',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'founder',
            'type' => 'parallax',
            'val1' => 'founders.jpeg',
            'created_at' => Carbon::now('UTC')
        ]);

        // General
        DB::table(self::$name)->insert([
            'key' => 'information',
            'type' => 'brand',
            'val1' => 'Permata Agrindo',
            'val2' => 'Best exporter in the world and promote Indonesian agriculture',
            'val3' => 'PT Suksesindo Digital Filantropi',
            'val4' => 'Banyuwangi, East Java, Indonesia',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'about',
            'type' => 'brand',
            'val1' => 'About Us',
            'val2' => 'Permata Agrindo is engaged in general supplier, general trading, and distributor as well as cultivation in agriculture. We partner with Indonesian farmers to produce the highest quality products. We can be sure that our products are of superior quality.',
            'created_at' => Carbon::now('UTC')
        ]);
        // Vision
        DB::table(self::$name)->insert([
            'key' => 'vision',
            'type' => 'brand',
            'val1' => 'Our Vision',
            'val2' => 'Our vision is to become the best exporter in the world and promote Indonesian agriculture.',
            'created_at' => Carbon::now('UTC')
        ]);
        // Mission
        DB::table(self::$name)->insert([
            'key' => 'mission',
            'type' => 'brand',
            'val1' => 'Our Mission',
            'val2' => 'Helping Indonesian farmers to become innovative farmers. Strategies for innovation in-stock availability and producing the best quality products from Indonesian farmers.',
            'created_at' => Carbon::now('UTC')
        ]);

        // DB::table(self::$name)->insert([
        //     'key' => 'mission_1',
        //     'type' => 'mission',
        //     'val1' => 'lightbulb',
        //     'val2' => 'Helping Indonesian farmers to become innovative farmers.',
        //     'created_at' => Carbon::now('UTC')
        // ]);
        // DB::table(self::$name)->insert([
        //     'key' => 'mission_2',
        //     'type' => 'mission',
        //     'val1' => 'star_rate',
        //     'val2' => 'Strategies for innovation in-stock availability and producing the best quality products from Indonesian farmers.',
        //     'created_at' => Carbon::now('UTC')
        // ]);
        // DB::table(self::$name)->insert([
        //     'key' => 'mission_3',
        //     'type' => 'mission',
        //     'val1' => 'group',
        //     'val2' => 'Build strategic business partners with buyers, farmers, and the government in the long term.',
        //     'created_at' => Carbon::now('UTC')
        // ]);

        // Value
        DB::table(self::$name)->insert([
            'key' => 'value_1',
            'type' => 'value',
            'val1' => 'lightbulb',
            'val2' => 'Quality',
            'val3' => 'Each product we sell always uses the best raw material and tested with a highly advanced machine, and certified laboratory to produce the best quality.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'value_2',
            'type' => 'value',
            'val1' => 'star_rate',
            'val2' => 'Innovation',
            'val3' => 'We always innovate in developing and making new breakthroughs in producing products that have always been of market interest and strengthen the customer\'s taste.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'value_3',
            'type' => 'value',
            'val1' => 'group',
            'val2' => 'Commitment',
            'val3' => 'Commitment is one of the keys to customer trust so it is something we always take care of and cannot be ignored. All forms of privileges that we give to serve customers are things that we always take care of.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'key' => 'value_4',
            'type' => 'value',
            'val1' => 'group',
            'val2' => 'Integrity',
            'val3' => 'Integrity means telling the truth, keeping our word and treating others with fairness and respect. Integrity is one of our most cherished assets. It must not be compromised.',
            'created_at' => Carbon::now('UTC')
        ]);

        // Connect val1 only [email, phone, link]
        DB::table(self::$name)->insert([
            'key' => 'connect_email',
            'type' => 'connect',
            'val1' => 'email',
            'val2' => 'contact@permataagrindo.com',
            'val3' => 'contact@permataagrindo.com',
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
