<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'father',
        'dob',
        'cnic',
        'phone',
        'email',
        'address',
        'designation',
        'join_date',
        'personal_no',
        'qualification',
        'image',

        //bise tag will be in separate model
    ];
    protected $casts = [
        'dob' => 'date',
        'join_date' => 'date',
    ];

    public function user()
    {
        $this->morphOne(User::class, 'userable');
    }
}
