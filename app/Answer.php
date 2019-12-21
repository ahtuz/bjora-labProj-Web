<?php

namespace Bjora;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $fillable = [
        'answer_detail',
    ];

    // relationship to user (one to many inverse)
    public function user()
    {
        return $this->belongsTo('Bjora\User', 'user_id', 'id');
    }

    // relationship to question (one to many inverse)
    public function question()
    {
        return $this->belongsTo('Bjora\Question', 'question_id', 'id');
    }
}
