<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
     protected $table ='person';
    use HasFactory ,SoftDeletes;
    public $timestamps = false;


    public function cities(){
        return $this->belongsTo(city::class,'city_id');
    }

    public function depts(){
        return $this->belongsTo(depts::class,'dept_id');
    }
}
