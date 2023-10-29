<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Role::create([
            'role_name' => 'admin',
        ]);

        Role::create([
            'role_name' => 'sm',
        ]);

        Role::create([
            'role_name' => 'gm',
        ]);

        Role::create([
            'role_name' => 'owner',
        ]);

        Role::create([
            'role_name' => 'customer',
        ]);

        Role::create([
            'role_name' => 'fo',
        ]);

        User::factory(10)->create();

    }
}