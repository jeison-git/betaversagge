<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; 

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [

            [
                'name' => 'Trajes',
                'slug' => Str::slug('trajes'),
                'icon' => '<i class="fa fa-male" aria-hidden="true"></i>',
            ],
            [
                'name' => 'Vestidos',
                'slug' => Str::slug('vestidos'),
                'icon' => '<i class="fa fa-female" aria-hidden="true"></i>',
            ],
            [
                'name' => 'Quinceaños',
                'slug' => Str::slug('quinceanos'),
                'icon' => '<i class="fa fa-birthday-cake" aria-hidden="true"></i>',
            ],
            [
                'name' => 'Bodas',
                'slug' => Str::slug('bodas'),
                'icon' => '<i class="fa fa-heart" aria-hidden="true"></i>',
            ],
            [
                'name' => 'Primera comunión',
                'slug' => Str::slug('primera-comunion'),
                'icon' => '<i class="fa fa-plus" aria-hidden="true"></i>',
            ],
            [
                'name' => 'Dress Code',
                'slug' => Str::slug('dress-code'),
                'icon' => '<i class="fa fa-check-circle" aria-hidden="true"></i>',
            ],

        ];

        foreach ($categories as $category){

            $category = Category::factory(1)->create($category)->first();

            $brands = Brand::factory(4)->create();

            foreach ($brands as $brand){
                $brand->categories()->attach($category->id);
            }

        }



    }
}
