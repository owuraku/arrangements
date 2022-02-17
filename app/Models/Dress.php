<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dress extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function measurements()
    {
        return $this->hasManyThrough(Measurement::class, Arrangement::class);
    }

     public function arrangements()
    {
        return $this->hasMany(Arrangement::class);
    }
}
