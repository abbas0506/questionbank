<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clas extends Model

{
    use HasFactory;
    protected $fillable = [
        'session_id',
        'incharge_id',
    ];


    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function title()
    {
        if ($this->session_id == session('session_id')) return "Part I";
        if ($this->session_id == session('session_id') - 1) return "Part II";
    }
    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function strength()
    {
        return $this->sections->sum(function ($query) {
            return $query->students->count();
        });
    }

    public function scopeActive($query)
    {
        return $query->where('session_id', '=', session('session_id'))
            ->orWhere('session_id', '=', session('session_id') - 1);
    }
}
