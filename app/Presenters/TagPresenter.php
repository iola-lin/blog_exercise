<?php

namespace App\Presenters;

use App\User;

class TagPresenter
{
    /**
     * 
     */
    public function getTagsByUser(User $user)
    {
        return $tags = $user->tags()->get(['id', 'name']);
    }
}