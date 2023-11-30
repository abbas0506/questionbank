<?php

namespace Database\Seeders;

use App\Models\Clas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Clas::create(['grade_id' => 6, 'section_label' => 'A', 'induction_year' => 2023]);
        Clas::create(['grade_id' => 6, 'section_label' => 'B', 'induction_year' => 2023]);
        Clas::create(['grade_id' => 6, 'section_label' => 'C', 'induction_year' => 2023]);

        Clas::create(['grade_id' => 7, 'section_label' => 'A', 'induction_year' => 2023]);
        Clas::create(['grade_id' => 7, 'section_label' => 'B', 'induction_year' => 2023]);
        Clas::create(['grade_id' => 7, 'section_label' => 'C', 'induction_year' => 2023]);

        Clas::create(['grade_id' => 8, 'section_label' => 'A', 'induction_year' => 2023]);
        Clas::create(['grade_id' => 8, 'section_label' => 'B', 'induction_year' => 2023]);
        Clas::create(['grade_id' => 8, 'section_label' => 'C', 'induction_year' => 2023]);

        Clas::create(['grade_id' => 9, 'section_label' => 'A', 'induction_year' => 2023]);
        Clas::create(['grade_id' => 9, 'section_label' => 'B', 'induction_year' => 2023]);
        Clas::create(['grade_id' => 9, 'section_label' => 'C', 'induction_year' => 2023]);
        Clas::create(['grade_id' => 9, 'section_label' => 'D', 'induction_year' => 2023]);

        Clas::create(['grade_id' => 10, 'section_label' => 'A', 'induction_year' => 2023]);
        Clas::create(['grade_id' => 10, 'section_label' => 'B', 'induction_year' => 2023]);
        Clas::create(['grade_id' => 10, 'section_label' => 'C', 'induction_year' => 2023]);
        Clas::create(['grade_id' => 10, 'section_label' => 'D', 'induction_year' => 2023]);

        Clas::create(['grade_id' => 11, 'section_label' => 'A', 'induction_year' => 2023]);
        Clas::create(['grade_id' => 11, 'section_label' => 'B', 'induction_year' => 2023]);

        Clas::create(['grade_id' => 12, 'section_label' => 'A', 'induction_year' => 2023]);
        Clas::create(['grade_id' => 12, 'section_label' => 'B', 'induction_year' => 2023]);
    }
}
