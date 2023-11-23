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
            'email' => 'abbas.sscs@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('super');

        $user = User::create([
            'name' => 'Admin',
            'email' => 'atifzohaibkhan@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Principal',
            'email' => 'ahmadbilalraza@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('principal');

        $user = User::create([
            'name' => 'Library Incharge',
            'email' => 'library.incharge@ghss.edu.pk',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('library_incharge');

        $user = User::create([
            'name' => 'Library Assistant',
            'email' => 'library.assistant@ghss.edu.pk',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('library_assistant');
    }
}
