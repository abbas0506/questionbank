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
        'qualification',
        'designation',
        'bps',
        'personal_no',
        'appointed_on',
        'joined_on',
        'image',

        //bise tag will be in separate model
    ];
    protected $casts = [
        'dob' => 'date',
        'appointed_on' => 'date',
        'joined_on' => 'date',
    ];

    public function user()
    {
        $this->morphOne(User::class, 'userable');
    }
    public function readings()
    {
        return $this->hasMany(BookIssuance::class, 'reader_id');
    }
}
