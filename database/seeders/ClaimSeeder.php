<?php

namespace Database\Seeders;

use App\Models\Claim;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClaimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { {
            $claims = [
                /*'Aliados Comerciales Vip'*/

                [
                    'commerce_id'  => 1,
                    'name'         => 'Versagge Elegance C.A',
                    'slug'         => Str::slug('versagge-elegance'),
                    'icon'         => '<img width="64" height="64" src="https://img.icons8.com/external-microdots-premium-microdot-graphic/64/external-bride-love-wedding-vol2-microdots-premium-microdot-graphic-3.png" alt="external-bride-love-wedding-vol2-microdots-premium-microdot-graphic-3"/>',
                    'manager'      => 'María Mandatos',
                    'document'     => '10.002.123',
                    'number_phone' => '04141401307',
                    'email'        => 'versaggeelegance@cantv.net',
                    'target'       => 'Alquiler de trajes y vestidos',
                    'url'          => 'https://www.instagram.com/trajesversagge/',
                    'description'  => 'Elegancia para cada ocasión ',
                    'address'      => 'La Florida, Calle Garcia Quinta Isa 1080 Caracas, Distrito Capital, Venezuela',
                    'observation'  => 'Versagge Elegance Alquiler de Trajes',
                ],

                /*Comercios Vip*/
                [
                    'commerce_id' => 2,
                    'name'        => 'Savage by Versagge',
                    'slug'         => Str::slug('savage-by-versagge'),
                    'icon'         => '<img width="64" height="64" src="https://img.icons8.com/external-microdots-premium-microdot-graphic/64/external-bride-love-wedding-vol2-microdots-premium-microdot-graphic-3.png" alt="external-bride-love-wedding-vol2-microdots-premium-microdot-graphic-3"/>',
                    'manager'      => 'Marìa Mandatos',
                    'document'     => '10.002.123',
                    'number_phone' => '04141401307',
                    'email'        => 'versaggeelegance@cantv.net',
                    'target'       => 'Alquiler de trajes de novias',
                    'url'          => 'https://www.instagram.com/savagenovias/',
                    'description'  => '¡Alquila tu vestido soñado!',
                    'address'      => '3ra Transversal, Altamira, entre Av, Luis Roche y San Juan Bosco, Edf. Oficentro Neur, Piso-01',
                    'observation'  => 'Aliado comercial de versagge elegance C.A',
                ],

            ];

            foreach ($claims as $claim) {

                $claim = Claim::factory(1)->create($claim)->first();
            }
        }
    }
}
