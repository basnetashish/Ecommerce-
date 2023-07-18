<?php

namespace Database\Seeders;

use App\Models\Backend\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $data =[

            [
                'cate_id' => '47',
                'name' => 'Smartwatch',
                'slug' => 'smartwatch',
                'small_description' =>'Smartwart with best features',
                'description' => 'All smartwatch  are available here',
                'orginal_price' => '5000',
                'selling_price' => '4500',
                 'image' =>'w3.jpg',
                 'qty' => '30',
                 'tax' => '5',
                'status' => '1',
                'trending' => '1',
                'meta_title' => 'watch',
                'meta_descrip' => 'watch',
                'meta_keywords' => 'watch',
            ],
            [
                'cate_id' => '47',
                'name' => 'Apple watch',
                'slug' => 'applewatch',
                'small_description' =>'Apple watch with best features',
                'description' => 'All apple watch  are available here',
                'orginal_price' => '8000',
                'selling_price' => '7000',
                 'image' =>'w4.jpg',
                 'qty' => '30',
                 'tax' => '5',
                'status' => '1',
                'trending' => '1',
                'meta_title' => 'watch',
                'meta_descrip' => 'watch',
                'meta_keywords' => 'watch',
            ]
        ];
        foreach($data as $product){
            $imageName = $product['image'];
            $product['image'] =$imageName;
            $this->moveImage($imageName);
            Product::create($product);
        }
      
    }
    public function  moveImage(string $imageName){
        $sourcePath = public_path('images/' .$imageName);
        $destinationPath = public_path('assets/backend/product/' .$imageName);
        File::move($sourcePath,  $destinationPath );
    }
}
