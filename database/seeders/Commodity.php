<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Commodity extends Seeder
{
    static $name = 'commodities';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(self::$name)->insert([
            'name' => 'Coffee Beans',
            'image' => 3,
            'slogan' => 'Best quality coffee beans',
            'description1' => 'A coffee bean is a seed of the Coffea plant and the source for coffee. It is the pip inside the red or purple fruit often referred to as a cherry.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'name' => 'Dragon Fruit',
            'image' => 4,
            'slogan' => 'Best quality dragon fruit',
            'description1' => 'Dragon fruit is a tropical fruit derived from cactus species from the genera Selenicereus and Hylocereus. Dragon fruit is rich in vitamin C, fiber, and iron which are good for health. We cooperate with Indonesian dragon fruit farmers in the availability of good quality products. ',
            'description2' => 'We make regular visits to farmers to control from planting, harvesting, to packing so that product quality is maintained and safe without defects until it reaches the buyer. We are ready to supply the global market in large quantities.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'name' => 'Coconut',
            'image' => 5,
            'slogan' => 'Innovative product from coconut',
            'description1' => 'A coconut is the edible fruit of the coconut palm (Cocos nucifera), a tree of the palm family. Coconut flesh is high in fat and can be dried or eaten fresh or processed into coconut milk or coconut oil. The liquid of the nut, known as coconut water, is used in beverages.',
            'created_at' => Carbon::now('UTC')
        ]);
    }
}
