<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestQuestionPart extends Model
{
    use HasFactory;
    protected $fillable = [
        'test_question_id',
        'question_id',
        'marks',
    ];
    public function testQuestion()
    {
        return $this->belongsTo(TestQuestion::class);
    }
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
