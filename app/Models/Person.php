<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
     protected $table ='person';
    use HasFactory;
    public $timestamps = false;


    public function cities(){
        return $this->belongsTo(city::class,'city_id');
    }

    public function depts(){
        return $this->belongsTo(depts::class,'dept_id');
    }
}
