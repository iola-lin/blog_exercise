<?php

namespace App\Presenter;

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