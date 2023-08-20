<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Status::create(['name' => 'Active']);
        Status::create(['name' => 'On Leave']);
        Status::create(['name' => 'Absent']);
        Status::create(['name' => 'Struck Off']);
    }
}
