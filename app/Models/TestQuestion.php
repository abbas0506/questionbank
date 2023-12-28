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
        'question_type',
        'necessary_parts',
    ];
    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
