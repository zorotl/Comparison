<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User(
            [
                'name' => 'Test-User',
                'email' => 'info@stws.ch',
                'code' => '5ec2d5edd764a',
                'role' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('test1234'),
                'remember_token' => Str::random(10),
            ]
        );
        $user->save();

        $user = new User(
            [
                'name' => 'Martin',
                'email' => 'm.striednig@gmail.com',
                'code' => '5ec2d5edd764b',
                'role' => 'admin',
                'email_verified_at' => now(),
                'password' => Hash::make('test1234'),
                'remember_token' => Str::random(10),
            ]
        );
        $user->save();
    }
}
