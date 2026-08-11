<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Setting::create([
            'key' => 'logo',
            'value' => 'images/logo.png'
        ]);

        $categoriesMap = [
            'Chandeliers' => 'chand',
            'Home Appliances' => 'electric',
            'Glassware' => 'glass',
            'Plastic Products' => 'plastics',
            'Cookware and Tableware' => 'plates and halas',
            'Tables' => 'tabels',
            'Decoration and Vases' => 'vases and decorations',
        ];

        foreach ($categoriesMap as $categoryName => $folderName) {
            $imageFiles = \Illuminate\Support\Facades\File::files(public_path('images/' . $folderName));
            
            $categoryImage = null;
            if (count($imageFiles) > 0) {
                $categoryImage = 'images/' . $folderName . '/' . $imageFiles[0]->getFilename();
            }

            $category = \App\Models\Category::create([
                'name' => $categoryName,
                'name_ar' => 'قسم ' . $categoryName, 
                'slug' => \Illuminate\Support\Str::slug($categoryName),
                'description' => 'Beautiful ' . strtolower($categoryName) . ' for your home.',
                'description_ar' => 'وصف جميل لقسم ' . $categoryName, 
                'image' => $categoryImage,
            ]);

            foreach ($imageFiles as $index => $file) {
                $productNum = $index + 1;
                $relativePath = 'images/' . $folderName . '/' . $file->getFilename();
                
                \App\Models\Product::create([
                    'category_id' => $category->id,
                    'name' => $categoryName . ' ' . $productNum,
                    'name_ar' => 'منتج ' . $categoryName . ' ' . $productNum, 
                    'slug' => \Illuminate\Support\Str::slug($categoryName . ' ' . $productNum),
                    'description' => 'Experience the quality and elegance of this ' . strtolower($categoryName) . ' piece, perfect for your space.',
                    'description_ar' => 'استمتع بجودة وأناقة هذا المنتج المثالي لمساحتك.', 
                    'price' => rand(50, 900) + 0.99,
                    'image' => $relativePath,
                ]);
            }
        }
    }
}
