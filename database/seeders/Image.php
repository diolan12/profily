<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Image extends Seeder
{
    static $name = 'images';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(self::$name)->insert([
            'file' => 'no-image-icon.png',
            'title' => 'Icon No Download',
            'credit' => '<a href="https://www.freeiconspng.com/img/23485">Icon No Download</a>',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'roast-level.jpg',
            'title' => 'Roast Level',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'comm-coffee-beans.jpg',
            'title' => 'Coffee Beans',
            'credit' => 'Photo by <a href="https://unsplash.com/@asthetik?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Mike Kenneally</a> on <a href="https://unsplash.com/@asthetik?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'comm-dragon-fruit.jpg',
            'title' => 'Pitaya Roja Dragonfruit',
            'credit' => 'Photo by <a href="https://www.pexels.com/@momtaz?utm_content=attributionCopyText&utm_medium=referral&utm_source=pexels">Md. Momtaz Ali</a> from <a href="https://www.pexels.com/photo/close-up-photo-of-sliced-dragon-fruit-3698450/?utm_content=attributionCopyText&utm_medium=referral&utm_source=pexels">Pexels</a>',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'comm-coconut.jpg',
            'title' => 'Coconut',
            'credit' => 'Photo by <a href="https://unsplash.com/@diomari?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Diomari Madulara</a> on <a href="https://unsplash.com/s/photos/coconut?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'prod-arabica-sumatra-mandheling.jpg',
            'title' => 'Arabica Sumatra Mandheling',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'prod-arabica-west-java.jpg',
            'title' => 'Arabica West Java',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'prod-arabica-bali-kintamani.jpg',
            'title' => 'Arabica Bali Kintamani',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'prod-arabica-gayo.jpg',
            'title' => 'Arabica Gayo',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'prod-arabica-toraja.jpg',
            'title' => 'Arabica Toraja',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'prod-arabica-flores.jpg',
            'title' => 'Arabica Flores',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'prod-arabica-wamena.jpg',
            'title' => 'Arabica Wamenas',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'prod-arabica-ijen-raung.jpg',
            'title' => 'Arabica Ijen Raung',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'prod-robusta-lampung.jpg',
            'title' => 'Robusta Lampung',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'prod-robusta-temanggung.jpg',
            'title' => 'Robusta Temanggung',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'prod-robusta-dampit.jpg',
            'title' => 'Robusta Dampit',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'prod-robusta-ijen-raung.jpg',
            'title' => 'Robusta Ijen Raung',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'prod-pitoya-roja.jpg',
            'title' => 'Pitaya Roja Dragon Fruit',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'prod-cocopeat-block.jpg',
            'title' => 'Cocopeat Block',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'file' => 'prod-coconut-fiber.jpg',
            'title' => 'Coconut Fiber',
            'created_at' => Carbon::now('UTC')
        ]);
    }
}
