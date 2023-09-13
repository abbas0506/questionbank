<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
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
        'group_id',
        'score',

        //school tag
        'admno',
        'section_id',
        'regno',
        'rollno',
        'status_id',

        //bise tag will be in separate model
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
