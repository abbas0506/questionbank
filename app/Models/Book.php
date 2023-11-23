<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'reference_no',
        'inroduction',
        'author',
        'publisher',
        'publish_year',
        'num_of_pages',
        'num_of_copies',
        'price',

        'language_id',
        'book_domain_id',
        'book_rack_id',
    ];
}
