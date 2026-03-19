<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::truncate();

        $products = [
            [
                'name' => 'Blink Flush Plate Matte Gold',
                'description' => 'Stainless-steel flush plate with matte gold PVD finish. Pneumatic actuation, universal concealed system compatibility.',
                'image_url' => 'https://images.unsplash.com/photo-1584622781867-1c5fe959d8f4?w=800&q=90',
                'brand' => 'Oli',
                'origin' => 'Portugal',
                'slug' => 'flush-plate-matte-gold',
                'is_featured' => true,
            ],
            [
                'name' => 'Premium Chrome Basin Mixer',
                'description' => 'Single-lever solid brass mixer with 5-year warranty. Solid brass construction with chrome plating.',
                'image_url' => 'https://images.unsplash.com/photo-1585909695284-32d2985ac9c0?w=800&q=90',
                'brand' => 'Grohe',
                'origin' => 'Germany',
                'slug' => 'chrome-basin-mixer',
                'is_featured' => true,
            ],
            [
                'name' => '5-Stage RO Water Filter',
                'description' => 'Removes 99% of impurities. Includes 10L tank and chrome faucet. Food-grade plastic construction.',
                'image_url' => 'https://images.unsplash.com/photo-1559825481-12a05cc00344?w=800&q=90',
                'brand' => 'Atlas Filtri',
                'origin' => 'Italy',
                'slug' => 'ro-water-filter-5stage',
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
