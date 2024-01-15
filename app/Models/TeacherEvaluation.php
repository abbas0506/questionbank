<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherEvaluation extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_evaluation_item_id',
        'teacher_id',
        'evaluation_marks',
        'weight',
        'month',
    ];
    public function teacherEvaluationItem()
    {
        return $this->belongsTo(TeacherEvaluationItem::class, 'teacher_evaluation_item_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function score()
    {
        return $this->weight * $this->evaluation_marks;
    }
    public function scopeMonth($query, $m)
    {
        return $query->where('month', $m);
    }
}
