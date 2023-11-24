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
        'dob',
        'password',
        'phone',
        'address',
        'group_id',
        'is_enrolled',
        'can_borrow_books',

        //school tag
        'clas_id',
        'rollno',
        'regno',

        //bise tag will be in separate model
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
