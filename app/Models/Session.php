<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = [
        'starts_at',
        'active',
    ];

    public function classes()
    {
        return $this->hasMany(Clas::class);
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function title()
    {
        return $this->starts_at . " - " . $this->starts_at - 2000 + 2;
    }
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
