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
        Grade::create(['grade_no' => 1, 'english_name' => 'One', 'roman_name' => 'I']);
        Grade::create(['grade_no' => 2, 'english_name' => 'Two', 'roman_name' => 'II']);
        Grade::create(['grade_no' => 3, 'english_name' => 'Three', 'roman_name' => 'III']);
        Grade::create(['grade_no' => 4, 'english_name' => 'Four', 'roman_name' => 'IV']);
        Grade::create(['grade_no' => 5, 'english_name' => 'Five', 'roman_name' => 'V']);
        Grade::create(['grade_no' => 6, 'english_name' => 'Six', 'roman_name' => 'VI']);
        Grade::create(['grade_no' => 7, 'english_name' => 'Seven', 'roman_name' => 'VII']);
        Grade::create(['grade_no' => 8, 'english_name' => 'Eight', 'roman_name' => 'VIII']);
        Grade::create(['grade_no' => 9, 'english_name' => 'Nine', 'roman_name' => 'IX']);
        Grade::create(['grade_no' => 10, 'english_name' => 'Ten', 'roman_name' => 'X']);
        Grade::create(['grade_no' => 11, 'english_name' => 'Part I', 'roman_name' => 'XI']);
        Grade::create(['grade_no' => 12, 'english_name' => 'Part II', 'roman_name' => 'XII']);
    }
}
