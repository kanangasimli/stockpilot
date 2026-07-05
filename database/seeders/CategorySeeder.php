<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Electronics',
            'Office Supplies',
            'Furniture',
            'Networking',
            'Storage',
            'Accessories',
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['name' => $category],
                [
                    'description' => $category . ' category',
                ]
            );
        }
    }
}