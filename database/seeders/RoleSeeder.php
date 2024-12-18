<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = array(
            array(
                'id' => '1',
                'name' => 'admin',
                'guard_name' => 'web',
            ),
            array(
                'id' => '2',
                'name' => 'user',
                'guard_name' => 'web',
            ),
            array(
                'id' => '3',
                'name' => 'seller',
                'guard_name' => 'web',
            ),


        );

      Role::insert($roles);

    
    }
}
