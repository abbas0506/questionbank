<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'marks',
        'is_approved',
        'bise_frequency',
        'is_from_exercise',
        'chapter_id',
        'question_type_id',
        'user_id', //owner id
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
    public function scopeShort($query)
    {
        return $query->where('question_type_id', 1);
    }
    public function scopeLong($query)
    {
        return $query->where('question_type_id', 2);
    }
    public function scopeMcqs($query)
    {
        return $query->where('question_type_id', 3);
    }
}
