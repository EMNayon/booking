<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            [
                'email' => 'admin@gmail.com'
            ],
            [
                'name' => 'Admin',
                'phone' => '017xxxxxxxx',
                'user_type' => User::USER_TYPE_ADMIN,
                'status' => User::STATUS_ACTIVE,
                'password' => Hash::make('12345678')
            ]
        );

        User::firstOrCreate(
            [
                'email' => 'bithi@gmail.com'
            ],
            [
                'name' => 'Agent',
                'phone' => '017xxxxxxxx',
                'user_type' => User::USER_TYPE_USER,
                'status' => User::STATUS_ACTIVE,
                'password' => Hash::make('12345678'),
                'point' => 1000000
            ]
        );
    }
}
