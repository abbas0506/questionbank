<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'name' => 'Super',
            'email' => 'super@sms.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('super');

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@sms.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Principal',
            'email' => 'principal@sms.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('principal');

        $user = User::create([
            'name' => 'Incharge',
            'email' => 'incharge@sms.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('incharge');

        $user = User::create([
            'name' => 'Teacher',
            'email' => 'teacher@sms.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('teacher');

        $user = User::create([
            'name' => 'Data Entry Person',
            'email' => 'dep@sms.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('dep');
    }
}
