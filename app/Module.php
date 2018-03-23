<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function course()
    {
        return $this->belongsToMany('App\Course','module_course');
    }
}
