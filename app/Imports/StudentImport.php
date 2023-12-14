<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    //
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $student = Student::create([
                'clas_id' => session('clas_id'),
                'rollno' => $row['rollno'],
                'name' => $row['name'],
                'father' => $row['father'],
                'dob' => \Carbon\Carbon::createFromFormat('d.m.Y', $row['dob']),
                'cnic' => $row['bform'],
                'address' => $row['address'],
                'phone' => $row['phone'],
                'group_id' => 2,
            ]);

            $user = User::create([
                'login_id' => $student->cnic,
                'password' => Hash::make('password'),
                'userable_id' => $student->id,
                'userable_type' => 'App\Models\Student',
            ]);
            $user->assignRole('student');
        }
    }
}
