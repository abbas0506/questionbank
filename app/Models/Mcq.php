<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcq extends Model
{
    use HasFactory;
    protected $fillable = [
        'option_a',
        'option_b',
        'option_c',
        'option_d',
    ];

    public function question()
    {
        return $this->hasOne(Question::class);
    }
}
