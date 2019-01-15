<?php

namespace App\Presenters;

use App\User;
use App\Article;

class TagPresenter
{
    /**
     * 
     */
    public function getTagsByUser(User $user)
    {
        return $tags = $user->tags()->get(['id', 'name']);
    }

    public function getSelectedTagsIdByArticle(Article $article)
    {
        return $article->tags()->get()->pluck('id')->all();
    }
}