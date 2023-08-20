<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillables = [
        'name',
        'father',
        'cnic',
        'phone',
        'email',
        'password',
        'address',
        'dob',
        'gender',
        'image',

        //school tag
        'admno',
        'section_id',
        'rollno',
        'status_id',

        //bise tag will be in separate model
    ];
}
