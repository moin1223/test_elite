<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserDetails;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        {
            $users = array(
                array(
                    'id' => '1',
                    'first_name' => 'MD.',
                    'last_name' => 'Kayes',
                    'email' => 'gmit@elitecorpo.com',
                    'password' => Hash::make('elitecorpo230928'),
                    'role' => 'admin',
                ),

            );

            foreach ($users as $user) {
                $r = $user['role'];
                unset($user['role']);

                $u = User::create($user);

                $role = Role::where('name', $r)->first();

                if ($role) {
                    $u->assignRole($role);
                }
                 UserDetails::create([
                'mobile_number'=>'01840',
                'gender' => 'male',
                'division_id' => 2,
                'district_id' => 2,
                'thana_id' => 2,
                'user_id' => 1,
            ]);

            }

        }

    }
}
