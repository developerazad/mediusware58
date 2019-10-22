<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = ['faculty_name', 'faculty_desc', 'active_fg'];
}
