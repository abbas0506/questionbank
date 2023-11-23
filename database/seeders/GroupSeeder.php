<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Group::create(['short_name' => 'MED', 'full_name' => 'Pre Medical']);
        Group::create(['short_name' => 'NMD', 'full_name' => 'Pre Engineering']);
        Group::create(['short_name' => 'ICS', 'full_name' => 'Intermediate in Computer Science']);
        Group::create(['short_name' => 'HMT', 'full_name' => 'Humanities']);
        Group::create(['short_name' => 'Science', 'full_name' => 'Science']);
        Group::create(['short_name' => 'Arts', 'full_name' => 'Arts']);
    }
}
