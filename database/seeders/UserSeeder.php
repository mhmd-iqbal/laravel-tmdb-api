<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'email' => 'test@example.com',
                'name'  => 'Muhammad Iqbal',
                'password'  => Hash::make('password'),
                'email_verified_at' => NULL,
            ]
        ];

        foreach ($users as $user) {
            User::create(
                [
                    'email' => $user['email'],
                    'name' => $user['name'],
                    'password' => $user['password'],
                    'email_verified_at' => $user['email_verified_at'],
                    'created_at'    => Carbon::now(),
                    'updated_at'    => Carbon::now(),
                ],
            );
        }
    }
}
