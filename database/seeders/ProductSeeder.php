<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::factory()->count(8)->create();

        // A few curated products
        Product::create([
            'name' => 'Essence Pearl Perfume',
            'slug' => 'essence-pearl-perfume',
            'description' => 'Premium floral fragrance with pearl notes',
            'price' => 89.99,
            'sale_price' => 79.99,
            'stock' => 145,
            'category' => 'Perfumes',
            'is_bestseller' => true,
            'rating' => 4.5,
        ]);

        Product::create([
            'name' => 'Luxury Rose Collection',
            'slug' => 'luxury-rose-collection',
            'description' => 'Exclusive rose and oud blend',
            'price' => 129.99,
            'stock' => 89,
            'category' => 'Perfumes',
            'rating' => 5,
        ]);
    }
}
