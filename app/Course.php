<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function modules()
    {
        return $this->belongsToMany('App\Module','module_course');
    }
    
    public function units()
    {
        return $this->hasMany('App\Unit');
    }
}
