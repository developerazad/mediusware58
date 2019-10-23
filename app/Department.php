<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function faculty(){
        return $this->belongsTo('App\Faculty');
    }
}
