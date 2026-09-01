<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Áo nam' => ['Áo thun', 'Áo sơ mi', 'Áo khoác'],
            'Áo nữ' => ['Áo kiểu', 'Áo len'],
        ];

        foreach ($data as $categoryName => $subs) {
            $category = Category::where('name', $categoryName)->first();
            foreach ($subs as $sub) {
                $category->subcategories()->create([
                    'name' => $sub,
                    'active' => true,
                ]);
            }
        }
    }
}
