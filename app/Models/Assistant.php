<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'active',
    ];
    public function user()
    {
        $this->morphOne(User::class, 'userable');
    }
    public function books()
    {
        return $this->hasMany(Book::class, 'assistant_id');
    }
}
