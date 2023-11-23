<?php

namespace Database\Seeders;

use App\Models\BookRack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookRackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        BookRack::create(['label' => 'A1']);
        BookRack::create(['label' => 'A2']);
        BookRack::create(['label' => 'A3']);
        BookRack::create(['label' => 'A4']);
        BookRack::create(['label' => 'A5']);

        BookRack::create(['label' => 'B1']);
        BookRack::create(['label' => 'B2']);
        BookRack::create(['label' => 'B3']);
        BookRack::create(['label' => 'B4']);
        BookRack::create(['label' => 'B5']);

        BookRack::create(['label' => 'C1']);
        BookRack::create(['label' => 'C2']);
        BookRack::create(['label' => 'C3']);
        BookRack::create(['label' => 'C4']);
        BookRack::create(['label' => 'C5']);

        BookRack::create(['label' => 'D1']);
        BookRack::create(['label' => 'D2']);
        BookRack::create(['label' => 'D3']);
        BookRack::create(['label' => 'D4']);
        BookRack::create(['label' => 'D5']);
    }
}
