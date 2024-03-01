<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'C',
            'price' => 56.89,
            'details' => 'Detail of product c',
            'publish' => 'Yes',
            'user_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'B',
            'price' => 23.33,
            'details' => 'B detail',
            'publish' => 'Yes',
            'user_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'A',
            'price' => 60.56,
            'details' => 'A detail....',
            'publish' => 'No',
            'user_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Lorem Ipsum user',
            'price' => 99.90,
            'details' => 'Lorem ipsum dolor sit amet. Est laboriosam nisi et illo facere non omnis iste non veniam dolorem At corporis voluptatem qui dignissimos aliquid ut tempore dignissimos? Ad maxime quae et voluptate aspernatur qui odio pariatur. user',
            'publish' => 'No',
            'user_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'admin lorem ipsum',
            'price' => 100.00,
            'details' => 'Lorem ipsum dolor sit amet. Aut error deserunt quo exercitationem illo eum nihil deserunt ea nisi velit consectetur et debitis consequatur sed maxime repudiandae.',
            'publish' => 'Yes',
            'user_id' => 2,
        ]);
    }
}
