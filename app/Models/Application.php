<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'father',
        'phone',
        'adddress',
        'matric_rollno',
        'matric_marks',
        'group_id',
        'is_other_board',
        'objection',
        'fee',
        'session_id',
    ];

    public function scopeToday($query)
    {
        return $query->whereDate('created_at', Carbon::today());
    }
    public function scopeRecommended($query)
    {
        return $query->whereNull('objection');
    }
    public function scopeObjectioned($query)
    {
        return $query->whereNotNull('objection');
    }
    public function scopeFeepaid($query)
    {
        return $query->whereNotNull('fee');
    }
    public function scopeMedical($query)
    {
        return $query->where('group_id', 1);
    }
    public function scopeEngg($query)
    {
        return $query->where('group_id', 2);
    }
    public function scopeIcs($query)
    {
        return $query->where('group_id', 3);
    }
    public function scopeArts($query)
    {
        return $query->where('group_id', 4);
    }
}
