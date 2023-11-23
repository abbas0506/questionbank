<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create(['name' => 'super']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'principal']);
        Role::create(['name' => 'incharge']);
        Role::create(['name' => 'teacher']);
        Role::create(['name' => 'accountant']);
        Role::create(['name' => 'library_incharge']);
        Role::create(['name' => 'library_assistant']);
        Role::create(['name' => 'student']);
        Role::create(['name' => 'student_feeder']);
    }
}
