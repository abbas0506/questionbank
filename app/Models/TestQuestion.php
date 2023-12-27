<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'test_id',
        'question_no',
        'max_parts',
        'necessary_parts',
        'marks_each',
    ];
}
