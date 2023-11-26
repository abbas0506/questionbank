<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'father',
        'dob',
        'cnic',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function clas()
    {
        return $this->belongsTo(Clas::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
