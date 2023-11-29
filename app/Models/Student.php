<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'user_id',
        'name',
        'father',
        'dob',
        'cnic',
        'phone',
        'address',
        'active',
        'can_borrow_books',

        //school tag
        'clas_id',
        'rollno',
        'group_id',
        'regno',

        //bise tag will be in separate model
    ];

    public function user()
    {
        $this->morphOne(User::class, 'userable');
    }

    public function clas()
    {
        return $this->belongsTo(Clas::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function readings()
    {
        return $this->hasMany(BookIssuance::class, 'reader_id');
    }
}
