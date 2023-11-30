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

        //admin
        $teacher = Teacher::create([
            'name' => "Atif Zohaib",
            'father' => "Ghulam Kibria Khan",
            'cnic' => "3610457786765",
            'phone' => "03045562621",
            'email' => "atifzohaibkhan@gmail.com",
            'designation' => 'SSE(CS)',
            'personal_no' => "31751791",
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
            'name' => 'Muhammad Ittfaq',
            'father' => "Ghazi Muhammad",
            'cnic' => "3640291865395",
            'phone' => "03143661308",
            'email' => "muhammadittfaq007@gmail.com",
            'designation' => 'EST',
            'personal_no' => "31561467",
        ]);
        $user = User::create([
            'login_id' => $teacher->cnic,
            'password' => Hash::make('password'),
            'userable_id' => $teacher->id,
            'userable_type' => 'App\Models\Teacher',
        ]);
        $user->assignRole('library_incharge');
        $user->assignRole('teacher');

        // lab assistant
        $student = Student::create([
            'name' => 'Muzammail Hussain',
            'father' => "Muhammad Munawar",
            'cnic' => "3640200000000",
            'phone' => "03000000000",
            'clas_id' => 22, //XI-A
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
        $user->assignRole('student');
    }
}
