<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

use function PHPUnit\Framework\returnSelf;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'test_date',
        'expires_at',
        'duration',
        'exercise_only',
        'frequent_only',
        'subject_id',
        'user_id',
    ];
    protected $casts = [
        'test_date' => 'date',

    ];
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function questions()
    {
        return $this->hasMany(TestQuestion::class, 'test_id');
    }
    public function parts()
    {
        return $this->hasManyThrough(TestQuestionPart::class, TestQuestion::class);
    }
    public function totalMarks()
    {
        $testQuestions = $this->questions;
        $sumOfMarks = 0;
        foreach ($this->questions as $testQuestion) {
            if ($testQuestion->question_type == 'mcq')
                $sumOfMarks += $testQuestion->necessary_parts;
            elseif ($testQuestion->question_type == 'short')
                $sumOfMarks += $testQuestion->necessary_parts * 2;
            else
                $sumOfMarks += $testQuestion->parts->sum('marks');
        }
        return $sumOfMarks;
    }
    public function getDuration()
    {
        $duration = 0;
        if ($this->duration)
            $duration = $this->duration;
        else
            $duration = round($this->totalMarks() * 1.5, 0);
        // if duration greater exceeds 59 minutes, then convert into hr min format
        if ($duration > 59) {
            $hr = round($duration / 60, 0);
            $min = $duration % 60;
            if ($min == 0) return $hr . "hr ";
            else return $hr . "hr " . $min . "min";
        } else
            return $duration . "min";
    }
}
