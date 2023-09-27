<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // استيراد SoftDeletes


class City extends Model
{
    protected $table = 'cities';
    protected $fillable = ['cityName'];


    public $timestamps = false; // تعطيل الخاصية التوقيت التلقائي

    use HasFactory, SoftDeletes;

    public function person(){
        return $this->hasMany(Person::class,'city_id');
    }
}
