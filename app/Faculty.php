<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function department(){
        return $this->hasMany('App\Department');
    }
    public function student(){
        return $this->hasMany('App\Student');
    }
}
