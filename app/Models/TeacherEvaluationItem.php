<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherEvaluationItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'weight',
    ];
    public function teacherEvaluations()
    {
        return $this->hasMany(TeacherEvaluation::class, 'teacher_evaluation_item_id');
    }
}
