<?php

namespace Database\Seeders;

use App\Models\TeacherEvaluationItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherEvaluationItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TeacherEvaluationItem::create(['name' => 'Teacher diary', 'weight' => 1]);
        TeacherEvaluationItem::create(['name' => 'Lesson plan', 'weight' => 1]);
        TeacherEvaluationItem::create(['name' => 'Homework checking', 'weight' => 1]);
        TeacherEvaluationItem::create(['name' => 'Dress code', 'weight' => 1]);
        TeacherEvaluationItem::create(['name' => 'Students subject Grip', 'weight' => 1]);
        TeacherEvaluationItem::create(['name' => 'Usage of AV aids', 'weight' => 1]);
        TeacherEvaluationItem::create(['name' => 'Teacher diary', 'weight' => 1]);
        TeacherEvaluationItem::create(['name' => 'Class regularity', 'weight' => 1]);
        TeacherEvaluationItem::create(['name' => 'Responsibility factor', 'weight' => 1]);
        TeacherEvaluationItem::create(['name' => 'Subject command', 'weight' => 1]);
        TeacherEvaluationItem::create(['name' => 'Overall performance', 'weight' => 1]);
    }
}
