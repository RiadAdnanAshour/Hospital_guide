<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // استيراد SoftDeletes


class Depts extends Model
{
    protected $table = 'depts';
    use HasFactory ,SoftDeletes;
    protected $fillable = ['Dept_Name'];
    public $timestamps = false; // تعطيل الخاصية التوقيت التلقائي
    public function person(){
        return $this->hasMany(Person::class,'dept_id');
    }
}
