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
        'author',
        'book_domain_id',
        'language_id',
        'publisher',
        'publish_year',
        'introduction',
        'num_of_pages',
        'num_of_copies',
        'price',
        'rack_no',
    ];
}
