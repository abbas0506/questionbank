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
    public function parts()
    {
        return $this->hasMany(TestQuestionPart::class);
    }
    public function scopeMcqs($query)
    {
        return $query->where('question_type', 'mcq');
    }
    public function scopeShort($query)
    {
        return $query->where('question_type', 'short');
    }
    public function scopeLong($query)
    {
        return $query->where('question_type', 'long');
    }
}
