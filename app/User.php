<?php

namespace Bjora;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'gender', 'address', 'profile_picture', 'birthday',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relationship to question (one to many)
    public function questions()
    {
        return $this->hasMany('Bjora\Question', 'id', 'user_id');
    }

    // relationship to answer (one to many)
    public function answers()
    {
        return $this->hasMany('Bjora\Answer', 'id', 'user_id');
    }

    public function receiveMessages()
    {
        return $this->hasMany('Bjora\Message', 'id', 'recipient_id');
    }

    public function sendMessages()
    {
        return $this->hasMany('Bjora\Message', 'id', 'sender_id');
    }
}
