<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // used in TopicPolicy
    public function ownsTopic(Topic $topic) {
        return $this->id === $topic->user->id;
    }

    // used in PostPolicy
    public function ownsPost(Post $post) {
        return $this->id === $post->user->id;
    }

    public function getJWTIdentifier() {
        // return the primary key of the user
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        // return a key-value array containing any custom claims to be added to the JWT
        return [];
    }
}
