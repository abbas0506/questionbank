<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'reference_no',
        'introduction',
        'author',
        'publisher',
        'publish_year',
        'num_of_copies',
        'price',

        'language_id',
        'book_domain_id',
        'book_rack_id',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
    public function domain()
    {
        return $this->belongsTo(BookDomain::class, 'book_domain_id');
    }
    public function rack()
    {
        return $this->belongsTo(BookRack::class, 'book_rack_id');
    }
    public function reference()
    {
        $pre = '';
        if ($this->id < 10) $pre = '0000';
        elseif ($this->id < 100) $pre = '000';
        elseif ($this->id < 1000) $pre = '00';
        elseif ($this->id < 10000) $pre = '0';
        else $pre = '';
        return  $this->rack->label . "-" . $pre . $this->id;
    }
}
