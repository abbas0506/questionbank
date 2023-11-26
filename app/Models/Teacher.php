<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'father',
        'dob',
        'cnic',
        'phone',
        'email',
        'address',
        'designation',
        'join_date',
        'personal_no'

        //bise tag will be in separate model
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
