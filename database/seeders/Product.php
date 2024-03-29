<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Product extends Seeder
{
    static $name = 'products';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Arabica
        DB::table(self::$name)->insert([
            'commodity' => 1,
            'type' => 1,
            'name' => 'Arabica Sumatra Mandheling',
            'image' => 6,
            'description' => 'Produced from 100% pure Arabica coffee from the Madaling highlands, North Sumatra, Indonesia. Arabica Mandeling has a distinctive taste, which is a little spicy and spicy. Arabica Mandheling is not only enjoyed by local coffee lovers but has also penetrated the international market.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'commodity' => 1,
            'type' => 1,
            'name' => 'Arabica West Java',
            'image' => 7,
            'description' => 'Produced from 100% pure Arabica coffee from Mount Puntang, West Java. , Indonesia. Arabica Puntang coffee was the winner of the taste category at the Specialty Coffee Association Of America Expo in Atlanta, United States, April 14-17, 2016. Until now Arabica Puntang coffee is still widely known and has loyal fans.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'commodity' => 1,
            'type' => 1,
            'name' => 'Arabica Bali Kintamani',
            'image' => 8,
            'description' => 'Produced from 100% pure Arabica coffee beans from Mount Batur Kintamani, Bali, Indonesia. Arabica Kintamani coffee is grown with a cider system using a traditional water system and geographical conditions that can create Arabica Kintamani coffee beans with a unique taste.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'commodity' => 1,
            'type' => 1,
            'name' => 'Arabica Gayo',
            'image' => 9,
            'description' => 'Produced from 100% pure Arabica coffee beans from the Gayo highlands, Central Aceh, Indonesia. Arabica Gayo coffee received Fair Trade Certified, from the International Trade Organization, 27 May 2010. And again obtained the highest cupping score, 10 October 2010. These certifications and achievements have further established Arabica Gayo coffee\'s position as the world\'s best organic coffee.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'commodity' => 1,
            'type' => 1,
            'name' => 'Arabica Toraja',
            'image' => 10,
            'description' => 'Produced from 100% pure Arabica coffee beans from the Sasean mountains, Toraja, South Sulawesi, Indonesia. Arabica Toraja coffee is one of the popular variants that has the best quality in Indonesia. With the Latin name Celeber Kalosi, Arabica Toraja Coffee has been known by coffee lovers around the world for its unique and distinctive taste.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'commodity' => 1,
            'type' => 1,
            'name' => 'Arabica Flores',
            'image' => 11,
            'description' => 'Produced from 100% pure Arabica coffee beans from the Ngada highlands, Flores, East Nusa Tenggara (NTT), Indonesia. Arabica Flores coffee is the largest export contributor for Indonesia. No wonder this coffee has become a popular coffee in the world. Arabica  Flores coffee is cultivated using organic methods. Where the fertilizer used is natural fertilizer without using pesticides. This produces coffee beans with a very unique aroma and taste.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'commodity' => 1,
            'type' => 1,
            'name' => 'Arabica Wamena',
            'image' => 12,
            'description' => 'Produced from 100% pure Arabica coffee beans from the Baliem Valley, Wamena, Papua, Indonesia. Arabica Wamena coffee has a very unique taste compared to other Arabica coffees because Indonesian coffee rarely has a floral sensation. The appearance of the aroma is influenced by planting conditions that do not use pesticides and other chemical compounds. ',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'commodity' => 1,
            'type' => 1,
            'name' => 'Arabica Ijen Raung',
            'image' => 13,
            'description' => 'Produced from 100% pure robusta coffee beans from the foot of Mount Ijen, Bondowoso, East Java, Indonesia. Arabica Ijne Raung coffee has a distinctive taste, which is a combination of tamarind and spicy. Because of this interesting taste, it gets a certificate of geographical indication. Not only loved by local coffee connoisseurs but has been known all over the world.',
            'created_at' => Carbon::now('UTC')
        ]);

        // Robusta
        DB::table(self::$name)->insert([
            'commodity' => 1,
            'type' => 2,
            'name' => 'Robusta Lampung',
            'image' => 14,
            'description' => 'Produced from 100% pure Robusta coffee beans from plantations in Lampung, Sumatra, Indonesia. Robusta Lampung Coffee is one of the coffees that is the prima donna of coffee connoisseurs. Climate, geographical location, and fertile soil conditions affect the taste of Robusta Lampung coffee.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'commodity' => 1,
            'type' => 2,
            'name' => 'Robusta Temanggung',
            'image' => 15,
            'description' => 'Dihasilkan dari 100% biji kopi robusta murni dari perkebunan Temanggung, Jawa Tengah, Indonesia. Rasa kopi Temanggung yang sangat kuat menjadi favorit dan memiliki harga jual yang tinggi di Negara - Negara Eropa dan Timur Tengah. Bahkan, kopi robusta Temanggung dianggap segabagai minuman mewah.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'commodity' => 1,
            'type' => 2,
            'name' => 'Robusta Dampit',
            'image' => 16,
            'description' => 'Produced from 100% pure robusta coffee beans from the foot of Mount Semeru, Dampit, Malang, Indonesia. Robusta Dampit has a chocolaty color taste combined with a strong body of coffee making it one of the best coffees in Indonesia.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'commodity' => 1,
            'type' => 2,
            'name' => 'Robusta Ijen Raung',
            'image' => 17,
            'description' => 'Produced from 100% pure robusta coffee beans from the foot of Mount Ijen, Bondowoso, East Java, Indonesia. Robusta Ijen Raung has a fairly distinctive taste. In addition to a bitter taste, this coffee also has a sour and sweet taste like chocolate.',
            'created_at' => Carbon::now('UTC')
        ]);

        // Dragonfruit
        DB::table(self::$name)->insert([
            'commodity' => 2,
            'type' => 3,
            'name' => 'Pitaya Roja Dragon Fruit',
            'image' => 18,
            'description' => 'Selenicereus costaricensis, synonym Hylocereus costaricensis, known as the Costa Rican pitahaya or Costa Rica nightblooming cactus, is a cactus species native to Costa Rica, Panama and Nicaragua.',
            'created_at' => Carbon::now('UTC')
        ]);

        // Coconut
        DB::table(self::$name)->insert([
            'commodity' => 3,
            'type' => 4,
            'name' => 'Cocopeat',
            'image' => 19,
            'description' => 'Many benefits can be obtained by using it. Good for use with the ground, or stand alone. Cocopeat is alsowidely chosen as a substitute for soil, cocopeat is easy to absorb and store water. It also has pores, wich facilitate the exchange pf air, and the entry of sunlight. The content of Trichoderma molds, a type of enzyme from fungi, can reduce disease in the soil. Thus, cocopeat can keep the soil loose and fertile.',
            'created_at' => Carbon::now('UTC')
        ]);
        DB::table(self::$name)->insert([
            'commodity' => 3,
            'type' => 4,
            'name' => 'Coconut Fiber',
            'image' => 20,
            'description' => 'Coconut fiber is fiber from coconut fiber that has been milled or described in the form of long hair and is generally yellow-brown in color. Cocofiber or coconut fiber is the result of processed coconut skin to produce coir fiber that has many benefits.',
            'created_at' => Carbon::now('UTC')
        ]);
    }
}
