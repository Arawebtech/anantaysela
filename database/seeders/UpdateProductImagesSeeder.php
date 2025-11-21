<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class UpdateProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fashion product images from Unsplash
        $imageUrls = [
            'https://images.unsplash.com/photo-1595777457583-95e059d581b8?w=800&h=1000&fit=crop',
            'https://images.unsplash.com/photo-1594633313593-bab3825d0caf?w=800&h=1000&fit=crop',
            'https://images.unsplash.com/photo-1594633312681-425c7b97ccd1?w=800&h=1000&fit=crop',
            'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=800&h=1000&fit=crop',
            'https://images.unsplash.com/photo-1617137968427-85924c800a22?w=800&h=1000&fit=crop',
            'https://images.unsplash.com/photo-1506629082955-511b1aa562c8?w=800&h=1000&fit=crop',
            'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=800&h=1000&fit=crop',
            'https://images.unsplash.com/photo-1521223890158-f9f7c3d5d504?w=800&h=1000&fit=crop',
            'https://images.unsplash.com/photo-1539533018447-63fcce2678e3?w=800&h=1000&fit=crop',
            'https://images.unsplash.com/photo-1558769132-cb1aea458c5e?w=800&h=1000&fit=crop',
            'https://images.unsplash.com/photo-1571945153237-4929e783af4a?w=800&h=1000&fit=crop',
            'https://images.unsplash.com/photo-1572804013309-59a88b7e92f1?w=800&h=1000&fit=crop',
        ];

        $products = Product::whereNull('image')->orWhere('image', '')->get();
        
        foreach ($products as $index => $product) {
            $product->image = $imageUrls[$index % count($imageUrls)];
            $product->save();
        }

        $this->command->info('Updated ' . $products->count() . ' products with images!');
    }
}

