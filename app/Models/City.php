<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = ['cityName'];
    public $timestamps = false; // تعطيل الخاصية التوقيت التلقائي

    use HasFactory;

    public function person(){
        return $this->hasMany(Person::class,'city_id');
    }
}
