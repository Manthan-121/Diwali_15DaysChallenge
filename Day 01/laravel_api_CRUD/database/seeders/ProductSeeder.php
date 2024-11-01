<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Wireless Mouse',
                'description' => 'Ergonomic wireless mouse with 2.4 GHz connection.',
                'price' => 15.99,
                'stock' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mechanical Keyboard',
                'description' => 'RGB backlit mechanical keyboard with blue switches.',
                'price' => 59.99,
                'stock' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'USB-C Hub',
                'description' => 'Multiport USB-C hub with HDMI, USB, and SD card slots.',
                'price' => 25.49,
                'stock' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Noise Cancelling Headphones',
                'description' => 'Over-ear Bluetooth headphones with active noise cancelling.',
                'price' => 85.00,
                'stock' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smartphone Stand',
                'description' => 'Adjustable aluminum stand for smartphones and tablets.',
                'price' => 12.95,
                'stock' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Product::insert($products);
    }
}
