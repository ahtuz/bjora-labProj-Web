<?php

namespace Bjora;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    // name of label table
    protected $table = 'question_labels';

    // relationship to questions (one to many)
    public function questions(){
        return $this->hasMany('Bjora\Question', 'id', 'label_id');
    }
}
