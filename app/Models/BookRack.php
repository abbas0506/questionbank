<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRack extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
