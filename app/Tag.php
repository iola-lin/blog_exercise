<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name', 'user_id'
    ];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
