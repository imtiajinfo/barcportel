<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
}
