<?php

use Illuminate\Database\Seeder;

use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

                Product::create([
                    'name' => 'Men\'s Short Sleeved Polo',
                    'description' => 'Men\'s fit. 65% cotton, 35% polyester, Imported,
                 Button closure, Machine Wash, CB DryTec Cotton+, 
                 Moisture wicking, UPF 50+ excellent UV protection.',
                    'image_url' => 'menspolo.png',
                    'price' => '29.99',
                    'weight' => '2.00',
                    'quantity' => '100',
                    'category' => 'shirt'
                ]);


                Product::create([
                        'name' => 'Women\'s Short Sleeved Polo',
                        'description' => 'Women\'s fit, short sleeved. 65% cotton, 35% polyester, Imported,
                 Button closure, Machine Wash, CB DryTec Cotton+,
                 Moisture wicking, UPF 50+ excellent UV protection.',
                        'image_url' => 'womenspolo.png',
                        'price' => '29.99',
                        'weight' => '2.00',
                        'quantity' => '100',
                    'category' => 'shirt',
                    ]);

                Product::create([
                        'name' => 'Men\'s Long Sleeved Polo',
                        'description' => ' Men\'s fit. 65% cotton, 35% polyester, Imported,
                 Button closure, Machine Wash, CB DryTec Cotton+,
                 Moisture wicking, UPF 50+ excellent UV protection.',
                        'image_url' => 'menslong.png',
                        'price' => '34.99',
                        'weight' => '2.00',
                        'quantity' => '95',
                    'category' => 'shirt',
                ]);

                Product::create([
                        'name' => 'Women\'s Long Sleeved Polo',
                        'description' => ' Women\'s fit. 65% cotton, 35% polyester, Imported,
                 Button closure, Machine Wash, CB DryTec Cotton+,
                 Moisture wicking, UPF 50+ excellent UV protection.',
                        'image_url' => 'womenslong.png',
                        'price' => '24.99',
                        'weight' => '.30',
                        'quantity' => '70',
                    'category' => 'shirt',
                    ]);

                Product::create([
                        'name' => 'CCS Travel Mug',
                        'description' => 'Community Colleges of Spokane Travel Mug.',
                        'image_url' => 'travelmug2.png',
                        'price' => '15.99',
                        'weight' => '.5',
                        'quantity' => '10',
                    'category' => 'cup',
                ]);

        Product::create([
            'name' => 'Geeky Travel Mug',
            'description' => 'A geeky mug to take on your travels.',
            'image_url' => 'travelmug1.png',
            'price' => '15.99',
            'weight' => '.5',
            'quantity' => '10',
            'category' => 'cup',
        ]);

        Product::create([
            'name' => 'CCS Mug',
            'description' => 'Community Colleges of Spokane Mug.',
            'image_url' => 'mug2.png',
            'price' => '8.99',
            'weight' => '.5',
            'quantity' => '10',
            'category' => 'cup',
        ]);

                Product::create([
                        'name' => 'Geeky Mug',
                        'description' => 'A mug with a geeky motto.',
                        'image_url' => 'mug1.png',
                        'price' => '8.99',
                        'weight' => '1.10',
                        'quantity' => '100',
                    'category' => 'cup',
                ]);
    }
}
