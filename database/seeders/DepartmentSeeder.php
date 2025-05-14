<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'Electronics', 'meta_title' => 'Buy Electronics Online', 'meta_description' => 'Shop the latest electronics including phones, laptops, and more.'],
            ['name' => 'Home & Kitchen', 'meta_title' => 'Home and Kitchen Essentials', 'meta_description' => 'Find everything you need for your home and kitchen.'],
            ['name' => 'Fashion', 'meta_title' => 'Latest Fashion Trends', 'meta_description' => 'Discover the newest trends in fashion for men and women.'],
            ['name' => 'Books', 'meta_title' => 'Books for All Ages', 'meta_description' => 'Bestsellers, fiction, non-fiction, and academic books.'],
            ['name' => 'Sports & Outdoors', 'meta_title' => 'Gear for Sports & Outdoors', 'meta_description' => 'Everything you need for fitness and adventure.'],
            ['name' => 'Toys & Games', 'meta_title' => 'Fun Toys & Games for Kids', 'meta_description' => 'Educational and entertaining toys.'],
            ['name' => 'Beauty & Health', 'meta_title' => 'Beauty & Health Products', 'meta_description' => 'Skincare, wellness, and personal care items.'],
            ['name' => 'Automotive', 'meta_title' => 'Automotive Essentials', 'meta_description' => 'Parts, accessories, and tools for vehicles.'],
            ['name' => 'Groceries', 'meta_title' => 'Daily Grocery Needs', 'meta_description' => 'Fresh and packaged food items.'],
            ['name' => 'Pet Supplies', 'meta_title' => 'Pet Supplies Online', 'meta_description' => 'Food, toys, and accessories for pets.'],
        ];

        foreach ($departments as $dept) {
            DB::table('departments')->insert([
                'name' => $dept['name'],
                'slug' => Str::slug($dept['name']),
                'meta_title' => $dept['meta_title'],
                'meta_description' => $dept['meta_description'],
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
