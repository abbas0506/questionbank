<?php

namespace Database\Seeders;

use App\Models\Teacher;
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
            'name' => 'Muhammad Abbas',
            'user_id' => '3530119663433',
            'password' => Hash::make('password'),
            'user_type' => 'teacher',
        ]);

        Teacher::create([
            'user_id' => $user->id,
            'name' => "Muhammad Abbas",
            'father' => "Muhammad Yousaf",
            'cnic' => "3530119663433",
            'phone' => "03000373004",
            'email' => "abbas.sscs@gmail.com",
            'designation' => 'SS(CS)',
            'personal_no' => "31282674",
        ]);
        $user->assignRole('admin');
        $user->assignRole('teacher');

        $user = User::create([
            'name' => 'Abdul Majeed',
            'user_id' => '3530119663434',
            'password' => Hash::make('password'),
            'user_type' => 'teacher',
        ]);
        Teacher::create([
            'user_id' => $user->id,
            'name' => "Abdul Majeed",
            'father' => "Muhammad Yousaf",
            'cnic' => "3530119663434",
            'phone' => "03000373005",
            'email' => "majeed.sscs@gmail.com",
            'designation' => 'SS(Eco)',
            'personal_no' => "31282675",
        ]);
        $user->assignRole('principal');
        $user->assignRole('teacher');

        $user = User::create([
            'name' => 'Muhammad Ittefaq',
            'user_id' => '3530119663435',
            'password' => Hash::make('password'),
            'user_type' => 'teacher',
        ]);

        Teacher::create([
            'user_id' => $user->id,
            'name' => 'Muhammad Ittefaq',
            'father' => "Muhammad Yousaf",
            'cnic' => "3530119663436",
            'phone' => "03000373006",
            'email' => "ittefaq.sscs@gmail.com",
            'designation' => 'EST',
            'personal_no' => "31282676",
        ]);
        $user->assignRole('library_incharge');

        $user = User::create([
            'name' => 'Library Assistant',
            'user_id' => '3530119663436',
            'password' => Hash::make('password'),
            'user_type' => 'teacher',
        ]);

        $user->assignRole('library_assistant');
    }
}
