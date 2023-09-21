<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            /*'trajes'*/

            [
                'category_id' => 1,
                'name'        => 'Caballero',
                'slug'        => Str::slug('caballero'),
                'color'       => true,
                'size'        => true,
            ],
            [
                'category_id' => 1,
                'name'        => 'Niño',
                'slug'        => Str::slug('nino'),
                'color'       => true,
                'size'        => true,
            ],
            /*vestidos*/
            [
                'category_id' => 2,
                'name'        => 'Mujeres',
                'slug'        => Str::slug('mujeres'),
                'color'       => true,
                'size'        => true,
            ],
            [
                'category_id' => 2,
                'name'        => 'Niñas',
                'slug'        => Str::slug('ninas'),
                'color'       => true,
                'size'        => true,
            ],
            /*quinceaños*/
            [
                'category_id' => 3,
                'name'        => 'Damas',
                'slug'        => Str::slug('damas'),
                'color'       => true,
                'size'        => true,
            ],
            /*bodas*/
            [
                'category_id' => 4,
                'name'        => 'Novias',
                'slug'        => Str::slug('novias'),
                'color'       => true,
                'size'        => true,
            ],
           /*primera-comunion*/
            [
                'category_id' => 5,
                'name'        => 'A medida',
                'slug'        => Str::slug('a-medida'),
                'color'       => true,
                'size'        => true,
            ],
             /*dress-code*/
            [
                'category_id' => 6,
                'name'        => 'Black TIE',
                'slug'        => Str::slug('black-tie'),
                'color'       => true,
                'size'        => true,
            ],
            [
                'category_id' => 6,
                'name'        => 'White TIE',
                'slug'        => Str::slug('white-tie'),
                'color'       => true,
                'size'        => true,
            ],

        ];

        foreach ($subcategories as $subcategory){

            Subcategory::factory(1)->create($subcategory);

        }

    }
}
