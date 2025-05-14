<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Top-level categories
        $parents = [
            ['name' => 'Mobiles', 'department_id' => 1],
            ['name' => 'Laptops', 'department_id' => 1],
            ['name' => 'Cameras', 'department_id' => 1],
            ['name' => 'Men', 'department_id' => 2],
            ['name' => 'Women', 'department_id' => 2],
            ['name' => 'Fiction', 'department_id' => 4],
            ['name' => 'Non-Fiction', 'department_id' => 4],
            ['name' => 'Furniture', 'department_id' => 3],
            ['name' => 'Cookware', 'department_id' => 3],
            ['name' => 'Educational', 'department_id' => 6],
            ['name' => 'Board Games', 'department_id' => 6],
            ['name' => 'Dog Supplies', 'department_id' => 10],
            ['name' => 'Cat Supplies', 'department_id' => 10],
            ['name' => 'Beauty & Health', 'department_id' => 7],
            ['name' => 'Automotive', 'department_id' => 8],
            ['name' => 'Groceries', 'department_id' => 9],
            ['name' => 'Sports & Outdoors', 'department_id' => 5],
        ];

        $this->insertCategories($parents);

        // Fetch parent category IDs
        $categoryMap = DB::table('categories')->pluck('id', 'name')->toArray();

        // Child categories using parent category IDs
        $children = [
            ['name' => 'Mobile Accessories', 'parent_id' => $categoryMap['Mobiles'], 'department_id' => 1],
            ['name' => 'Smartphones', 'parent_id' => $categoryMap['Mobiles'], 'department_id' => 1],
            ['name' => 'Chargers', 'parent_id' => $categoryMap['Mobiles'], 'department_id' => 1],

            ['name' => 'Gaming Laptops', 'parent_id' => $categoryMap['Laptops'], 'department_id' => 1],
            ['name' => 'Business Laptops', 'parent_id' => $categoryMap['Laptops'], 'department_id' => 1],

            ['name' => 'DSLR Cameras', 'parent_id' => $categoryMap['Cameras'], 'department_id' => 1],
            ['name' => 'Mirrorless Cameras', 'parent_id' => $categoryMap['Cameras'], 'department_id' => 1],

            ['name' => 'Men\'s Shoes', 'parent_id' => $categoryMap['Men'], 'department_id' => 2],
            ['name' => 'Men\'s Accessories', 'parent_id' => $categoryMap['Men'], 'department_id' => 2],

            ['name' => 'Women\'s Dresses', 'parent_id' => $categoryMap['Women'], 'department_id' => 2],
            ['name' => 'Women\'s Shoes', 'parent_id' => $categoryMap['Women'], 'department_id' => 2],

            ['name' => 'Fantasy', 'parent_id' => $categoryMap['Fiction'], 'department_id' => 4],
            ['name' => 'Sci-Fi', 'parent_id' => $categoryMap['Fiction'], 'department_id' => 4],

            ['name' => 'Biographies', 'parent_id' => $categoryMap['Non-Fiction'], 'department_id' => 4],
            ['name' => 'History', 'parent_id' => $categoryMap['Non-Fiction'], 'department_id' => 4],

            ['name' => 'Living Room Furniture', 'parent_id' => $categoryMap['Furniture'], 'department_id' => 3],
            ['name' => 'Bedroom Furniture', 'parent_id' => $categoryMap['Furniture'], 'department_id' => 3],

            ['name' => 'Cookware Sets', 'parent_id' => $categoryMap['Cookware'], 'department_id' => 3],
            ['name' => 'Cookware Accessories', 'parent_id' => $categoryMap['Cookware'], 'department_id' => 3],

            ['name' => 'Textbooks', 'parent_id' => $categoryMap['Educational'], 'department_id' => 6],
            ['name' => 'Online Courses', 'parent_id' => $categoryMap['Educational'], 'department_id' => 6],

            ['name' => 'Strategy Games', 'parent_id' => $categoryMap['Board Games'], 'department_id' => 6],
            ['name' => 'Card Games', 'parent_id' => $categoryMap['Board Games'], 'department_id' => 6],

            ['name' => 'Dog Food', 'parent_id' => $categoryMap['Dog Supplies'], 'department_id' => 10],
            ['name' => 'Dog Toys', 'parent_id' => $categoryMap['Dog Supplies'], 'department_id' => 10],

            ['name' => 'Cat Food', 'parent_id' => $categoryMap['Cat Supplies'], 'department_id' => 10],
            ['name' => 'Cat Toys', 'parent_id' => $categoryMap['Cat Supplies'], 'department_id' => 10],

            ['name' => 'Skincare', 'parent_id' => $categoryMap['Beauty & Health'], 'department_id' => 7],
            ['name' => 'Hair Care', 'parent_id' => $categoryMap['Beauty & Health'], 'department_id' => 7],
            ['name' => 'Makeup', 'parent_id' => $categoryMap['Beauty & Health'], 'department_id' => 7],

            ['name' => 'Car Accessories', 'parent_id' => $categoryMap['Automotive'], 'department_id' => 8],
            ['name' => 'Vehicle Parts', 'parent_id' => $categoryMap['Automotive'], 'department_id' => 8],

            ['name' => 'Fruits & Vegetables', 'parent_id' => $categoryMap['Groceries'], 'department_id' => 9],
            ['name' => 'Dairy Products', 'parent_id' => $categoryMap['Groceries'], 'department_id' => 9],

            ['name' => 'Outdoor Sports', 'parent_id' => $categoryMap['Sports & Outdoors'], 'department_id' => 5],
            ['name' => 'Fitness Equipment', 'parent_id' => $categoryMap['Sports & Outdoors'], 'department_id' => 5],
        ];

        $this->insertCategories($children);
    }

    /**
     * Insert categories into the database.
     *
     * @param array $categories
     * @return void
     */
    private function insertCategories(array $categories)
    {
        foreach ($categories as &$category) {
            $category['active'] = true;
            $category['created_at'] = now();
            $category['updated_at'] = now();
        }

        DB::table('categories')->insert($categories);
    }
}
