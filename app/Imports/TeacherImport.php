<?php

namespace App\Imports;

use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
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

            $teacher = Teacher::create([
                'name' => $row['name'],
                'father' => $row['father'],
                'dob' => \Carbon\Carbon::createFromFormat('d.m.Y', $row['dob']),
                'cnic' => $row['cnic'],
                'phone' => $row['phone'],
                'email' => $row['email'],
                'address' => $row['address'],
                'qualification' => $row['qualification'],
                'designation' => $row['designation'],
                'bps' => $row['bps'],
                'personal_no' => $row['personal'],
                'appointed_on' => \Carbon\Carbon::createFromFormat('d.m.Y', $row['appointed_on']),
                'joined_on' => \Carbon\Carbon::createFromFormat('d.m.Y', $row['joined_on']),
            ]);
            $user = User::create([
                'login_id' => $teacher->cnic,
                'password' => Hash::make('password'),
                'userable_id' => $teacher->id,
                'userable_type' => 'App\Models\Teacher',
            ]);

            $user->assignRole('teacher');
        }
    }
}
