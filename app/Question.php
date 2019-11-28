<?php

namespace Bjora;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    // relationship to user (one to many inverse)
    public function user()
    {
        return $this->belongsTo('Bjora\User', 'user_id', 'id');
    }

    // relationship to answer (one to many)
    public function answers()
    {
        return $this->hasMany('Bjora\Answer');
    }
}
