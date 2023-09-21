<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $role = Role::create(['name' => 'admin']); */

        $user = User::create([

            'name'  => 'jeison Aguilar',
            'email' => 'jeison.a.r.2013@gmail.com',
            'password' => bcrypt('ja123456789'),

        ]);

        $user->assignRole('Admin');

        User::factory(20)->create();

       
    }
}
