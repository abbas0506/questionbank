<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Book::create([
            'title' => 'The Sufism',
            'author' => 'Ishfaq Ahmad',
            'publish_year' => 2022,
            'num_of_copies' => 2,
            'price' => 400,
            'language_id' => 1,
            'book_domain_id' => 2,
            'book_rack_id' => 1,
        ]);
        Book::create([
            'title' => 'The Great Allah',
            'author' => 'Ishfaq Ahmad',
            'publish_year' => 2022,
            'num_of_copies' => 2,
            'price' => 400,
            'language_id' => 1,
            'book_domain_id' => 2,
            'book_rack_id' => 1,
        ]);
    }
}
