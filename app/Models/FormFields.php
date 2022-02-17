<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormFields extends Model
{
    use HasFactory;

    protected $table = 'formfields';
    protected $with = ['field_type'];


    protected $casts = [
        'options' => 'array',
        'is_input_text' => 'boolean'
    ];

      protected $fillable = [
        'name',
        'placeholder',
        'type',
        'class',
        'imagelink',
        'videolink',
        'min',
        'max',
        'position',
        'description',
        'options'
    ];


    public function arrangement()
    {
        return $this->belongsTo(Dress::class);
    }

    public function field_type(){
        return $this->belongsTo(FormFieldType::class,'formfield_type_id')->withDefault();
    }

    public function setIsInputTextAttribute($value){
        $this->attributes['is_input_text'] = $value == "true" ? 1 : 0;
    }
}
