<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Grade::create(['grade_no' => 6, 'english_name' => 'Six', 'roman_name' => 'VI']);
        Grade::create(['grade_no' => 7, 'english_name' => 'Seven', 'roman_name' => 'VII']);
        Grade::create(['grade_no' => 8, 'english_name' => 'Eight', 'roman_name' => 'VIII']);
        Grade::create(['grade_no' => 9, 'english_name' => 'Nine', 'roman_name' => 'IX']);
        Grade::create(['grade_no' => 10, 'english_name' => 'Ten', 'roman_name' => 'X']);
        Grade::create(['grade_no' => 11, 'english_name' => 'Part I', 'roman_name' => 'XI']);
        Grade::create(['grade_no' => 12, 'english_name' => 'Part II', 'roman_name' => 'XII']);
    }
}
