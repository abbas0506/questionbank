<?php

namespace Database\Seeders;

use App\Models\BookDomain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookDomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        BookDomain::create(['name' => 'Science']);
        BookDomain::create(['name' => 'Religion']);
        BookDomain::create(['name' => 'Literature']);
        BookDomain::create(['name' => 'Kids Corner']);
        BookDomain::create(['name' => 'History']);
        BookDomain::create(['name' => 'Encyclopedia']);
    }
}
