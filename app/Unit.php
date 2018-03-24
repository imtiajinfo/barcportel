<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
