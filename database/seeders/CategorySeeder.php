<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Backend\Category;
use Illuminate\Support\Facades\File;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
                    [
                        'name' => 'Game',
                        'slug' => 'game',
                        'description' => 'All game products are available here',
                        'status' => '1',
                        'popular' => '1',
                        'image' => 'p2.png',
                        'meta_title' => 'game',
                        'meta_descrip' => 'game',
                        'meta_keywords' => 'game',
                    ],
                    [
                        'name' => 'Watch',
                        'slug' => 'watch',
                        'description' => 'All watch products are available here',
                        'status' => '1',
                        'popular' => '1',
                        'image' => 'w1.jpg',
                        'meta_title' => 'watch',
                        'meta_descrip' => 'watch',
                        'meta_keywords' => 'watch',
                    ]

        ];
        foreach ($data as $category) {
            $imageName = $category['image'];
            $category['image'] = $imageName;
            $this->moveImageToCategory($imageName);
            Category::create($category);
        }
       
    }
    
    
    private function moveImageToCategory(string $imageName): void
    {
        $sourcePath = public_path('images/' . $imageName);
        $destinationPath = public_path('assets/category/' . $imageName);

        if (!File::exists($sourcePath)) {
            return;
        }

        File::move($sourcePath, $destinationPath);
    }
}
