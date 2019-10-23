<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];
    public function departmentFaculty(){
        return $this->belongsToMany('App\Department','App\Faculty');
    }
    public function faculty(){
        return $this->belongsTo('App\Faculty');
    }
}
