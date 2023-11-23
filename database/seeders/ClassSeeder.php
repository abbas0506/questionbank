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
        Clas::create(['english_name' => 'Six', 'roman_name' => 'VI', 'positional_name' => '6th', 'level_id' => 2]);
        Clas::create(['english_name' => 'Seven', 'roman_name' => 'VII', 'positional_name' => '7th', 'level_id' => 2]);
        Clas::create(['english_name' => 'Eight', 'roman_name' => 'VIII', 'positional_name' => '8th', 'level_id' => 2]);
        Clas::create(['english_name' => 'Nine', 'roman_name' => 'IX', 'positional_name' => '9th', 'level_id' => 3]);
        Clas::create(['english_name' => 'Ten', 'roman_name' => 'X', 'positional_name' => '10th', 'level_id' => 3]);
        Clas::create(['english_name' => 'Part I', 'roman_name' => 'XI', 'positional_name' => '11th', 'level_id' => 4]);
        Clas::create(['english_name' => 'Part 2', 'roman_name' => 'XII', 'positional_name' => '12th', 'level_id' => 4]);
    }
}
