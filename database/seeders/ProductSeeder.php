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
        Product::insert([
            [
                'name' => 'Laptop',
                'description' => 'Macbook Air M1',
                'image_url' => 'https://www.apple.com/newsroom/images/product/mac/standard/Apple_new-macbookair-wallpaper-screen_11102020_big.jpg.large.jpg'
            ],
            [
                'name' => 'Keyboard',
                'description' => 'Keychron Q5 Pro',
                'image_url' => 'https://media.wired.com/photos/65fdd8cd136c31f8d27d8ea5/master/w_2560%2Cc_limit/Keychron%2520Q6%2520Pro%2520lifestyle%2520SOURCE%2520Keychron.jpeg'
            ],
            [
                'name' => 'Monitor',
                'description' => 'Monitor Dell 23.8',
                'image_url' => 'https://m.media-amazon.com/images/I/61-ambFU-eL.jpg'
            ],
        ]);
    }
}
