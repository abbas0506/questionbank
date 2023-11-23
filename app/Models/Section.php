<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_label',
        'clas_id',
        'incharge_id',
        'start_year',
        'end_year',

    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
