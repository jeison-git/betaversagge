<?php

namespace Database\Seeders;

use App\Models\Commerce;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CommerceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Commerce::create([

                'name' => 'Versagge Elegance C.A',
                'slug' => Str::slug('versagge-elegance'),
                'description' => 'Elegancia para cada ocasión ',

        ]);

        Commerce::create([

            'name' => 'Savage by Versagge',
            'slug' => Str::slug('savage-by-versagge'),
            'description' => '¡Alquila tu vestido soñado!',

        ]); 

    }

}
