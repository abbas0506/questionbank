<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',    //section label A, B, C
        'clas_id',
        'incharge_id',
        'induction_year',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
