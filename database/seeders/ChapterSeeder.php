<?php

namespace Database\Seeders;

use App\Models\Chapter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Chapter::create([
            'name' => 'Basics of Information Technology',
            'subject_id' => 3,
            'chapter_no' => 1,
        ]);
        Chapter::create([
            'name' => 'Network Topologies',
            'subject_id' => 3,
            'chapter_no' => 2,
        ]);
        Chapter::create([
            'name' => 'Network Models',
            'subject_id' => 3,
            'chapter_no' => 3,
        ]);
        Chapter::create([
            'name' => 'Applications of Computer',
            'subject_id' => 3,
            'chapter_no' => 4,
        ]);
    }
}
