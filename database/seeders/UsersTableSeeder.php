<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'              => 1,
                'name'            => 'Admin Pethoc',
                'email'           => 'admin@pethoc.com',
                'password'        => bcrypt('password'),
                'remember_token'  => null,
                'two_factor_code' => '',
                'phone_number'    => '08101234567',
            ],
            [
                'id'              => 2,
                'name'            => 'User Pethoc',
                'email'           => 'user@pethoc.com',
                'password'        => bcrypt('password'),
                'remember_token'  => null,
                'two_factor_code' => '',
                'phone_number'    => '08112345678',
            ],
            [
                'id'              => 3,
                'name'            => 'Driver Pethoc',
                'email'           => 'driver@pethoc.com',
                'password'        => bcrypt('password'),
                'remember_token'  => null,
                'two_factor_code' => '',
                'phone_number'    => '08021234567',
            ],
        ];

        User::insert($users);
    }
}
