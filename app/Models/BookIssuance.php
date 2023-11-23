<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookIssuance extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id',
        'copy_no',
        'reader_id',
        'issue_date',
        'due_date',
        'return_date',
        'book_status', //return book status
    ];
}
