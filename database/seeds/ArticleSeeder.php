<?php

use Illuminate\Database\Seeder;
use App\User;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * specify "Tag"
         */
        $user = User::first();
        $tag = factory(App\Tag::class)->create();
        $articles = factory(App\Article::class, 20)->create(['user_id' => $user->id]);
        $tag->articles()->sync($articles->pluck('id')->all());
    }
}
