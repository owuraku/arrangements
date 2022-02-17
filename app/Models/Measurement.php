<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'placeholder',
        'value',
        'class',
        'imagelink',
        'videolink',
        'min',
        'max',
        'position'
    ];


    public function arrangement()
    {
        return $this->belongsTo(Dress::class);
    }


}
