<?php

namespace Database\Seeders;

use App\Models\Student;
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
        //admin
        $teacher = Teacher::create([
            'name' => "Muhammad Abbas",
            'father' => "Muhammad Yousaf",
            'cnic' => "3530119663433",
            'phone' => "03000373004",
            'email' => "abbas.sscs@gmail.com",
            'designation' => 'SS(CS)',
            'personal_no' => "31282674",
        ]);

        $user = User::create([
            'login_id' => $teacher->cnic,
            'password' => Hash::make('password'),
            'userable_id' => $teacher->id,
            'userable_type' => 'App\Models\Teacher',
        ]);

        $user->assignRole('admin');
        $user->assignRole('teacher');

        // principal
        $teacher = Teacher::create([
            'name' => "Abdul Majeed",
            'father' => "Muhammad Yousaf",
            'cnic' => "3530119663434",
            'phone' => "03000373005",
            'email' => "majeed.sscs@gmail.com",
            'designation' => 'SS(Eco)',
            'personal_no' => "31282675",
        ]);
        $user = User::create([
            'login_id' => $teacher->cnic,
            'password' => Hash::make('password'),
            'userable_id' => $teacher->id,
            'userable_type' => 'App\Models\Teacher',
        ]);
        $user->assignRole('principal');
        $user->assignRole('teacher');

        // lab incharge
        $teacher = Teacher::create([
            'name' => 'Muhammad Ittefaq',
            'father' => "Muhammad Yousaf",
            'cnic' => "3530119663436",
            'phone' => "03000373006",
            'email' => "ittefaq.sscs@gmail.com",
            'designation' => 'EST',
            'personal_no' => "31282676",
        ]);
        $user = User::create([
            'login_id' => $teacher->cnic,
            'password' => Hash::make('password'),
            'userable_id' => $teacher->id,
            'userable_type' => 'App\Models\Teacher',
        ]);
        $user->assignRole('library_incharge');

        // lab assistant
        $student = Student::create([
            'name' => 'Muzammail Hussain',
            'father' => "Munawar Hussain",
            'cnic' => "3530119663437",
            'phone' => "03000373006",
            'clas_id' => 6,
            'rollno' => 13,
            'group_id' => 3,

        ]);
        $user = User::create([
            'login_id' => $student->cnic,
            'password' => Hash::make('password'),
            'userable_id' => $student->id,
            'userable_type' => 'App\Models\Student',
        ]);
        $user->assignRole('library_assistant');
    }
}
