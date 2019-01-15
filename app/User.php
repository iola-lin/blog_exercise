<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password', 'verified_at'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $dates = ['deleted_at', 'verified_at'];

    /** Relationship */
    public function articles()
    {
        return $this->hasMany('App\Article', 'user_id', 'id');
    }
    public function tags()
    {
        return $this->hasMany('App\Tag', 'user_id', 'id');
    }
}
