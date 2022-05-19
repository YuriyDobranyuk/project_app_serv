<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::factory()->create([
             'name' => 'Manager',
             'slug' => 'manager',
             'permissions' => [
                 'read' => true,
                 'write' => false,
                 'edit' => true
             ]
         ]);
        \App\Models\Role::factory()->create([
            'name' => 'Client',
            'slug' => 'client',
            'permissions' => [
                'read' => false,
                'write' => true,
                'edit' => false
            ]
        ]);
    }
}
