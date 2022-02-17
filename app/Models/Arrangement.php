<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrangement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function formfields()
    {
        return $this->hasMany(FormFields::class)->orderBy('position');
    }

    public static function nextPosition($id){
        return optional(Arrangement::findOrFail($id)->formfields()->get()->last())->position + 1 ;
    }
}
