<?php

namespace Bjora;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question_detail', 'label_id', 'user_id', 'status',
    ];
    
    // relationship to user (one to many inverse)
    public function user()
    {
        return $this->belongsTo('Bjora\User', 'user_id', 'id');
    }

    // relationship to answer (one to many)
    public function answers()
    {
        return $this->hasMany('Bjora\Answer', 'id', 'question_id');
    }

    // relationship to label (one to many inverse)
    public function label(){
        return $this->belongsTo('Bjora\Label', 'label_id', 'id');
    }
}
