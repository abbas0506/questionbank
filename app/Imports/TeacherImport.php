<?php

namespace App\Imports;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeacherImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $user = User::create([
                'name' => $row['name'],
                'user_id' => $row['cnic'],
                'password' => Hash::make('password'),
                'user_type' => 'teacher',
            ]);

            Teacher::create([
                'user_id' => $user->id,
                'name' => $row['name'],
                'father' => $row['father'],
                'cnic' => $row['cnic'],
                'phone' => $row['phone'],
                'email' => $row['email'],
                'designation' => $row['designation'],
                'personal_no' => $row['personal'],
            ]);
            $user->assignRole('teacher');
        }
    }
}
