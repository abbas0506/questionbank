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
        Group::create(['name' => 'Pre-Medical', 'short' => 'Medical']);
        Group::create(['name' => 'Pre-Engineering', 'short' => 'Non-medical']);
        Group::create(['name' => 'Intermediate in Computer Science', 'short' => 'ICS']);
        Group::create(['name' => 'Humanities', 'short' => 'Arts']);
    }
}
