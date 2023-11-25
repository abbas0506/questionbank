<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clas extends Model

{
    use HasFactory;
    protected $fillable = [
        'grade_id',
        'section_label',    //section label A, B, C
        'induction_year',
        'incharge_id',
    ];


    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function incharge()
    {
        return $this->belongsTo(User::class, 'incharge_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function roman()
    {
        return $this->grade->roman_name . "-" . $this->section_label;
    }
    public function scopeActive($query)
    {
        $duration = ($this->grade_no < 9 ? 3 : 2);

        return $query->where('induction_year', '>=', date('y') - $duration);
    }
}
