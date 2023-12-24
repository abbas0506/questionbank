<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Subject::create(['name' => 'English', 'grade_id' => 11]);
        Subject::create(['name' => 'Physics', 'grade_id' => 11]);
        Subject::create(['name' => 'Computer Science', 'grade_id' => 11]);
    }
}
