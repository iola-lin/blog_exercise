<?php

namespace App\Presenters;

use App\Tag;

class ArticlePresenter
{
    public function getArticlesByTag(Tag $tag)
    {
        return $tag->articles()->paginate(5);
    }
}