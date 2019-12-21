<?php

namespace Bjora;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'message_detail',
    ];

    public function recipient()
    {
        return $this->belongsTo('Bjora\User', 'recipient_id', 'id');
    }

    public function sender()
    {
        return $this->belongsTo('Bjora\User', 'sender_id', 'id');
    }
}
