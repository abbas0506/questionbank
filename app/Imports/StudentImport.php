<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
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
            Student::create([
                'rollno' => $row['rollno'],
                'name' => $row['name'],
                'father' => $row['father'],
                'cnic' => $row['bform'],
                'clas_id' => session('clas_id'),
                'group_id' => 2,
            ]);
        }
    }
}
