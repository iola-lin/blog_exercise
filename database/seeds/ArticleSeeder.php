<?php

use Illuminate\Database\Seeder;

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
        $tag = factory(App\Tag::class)->create();
        $user = $tag->user()->first();
        $articles = factory(App\Article::class, 20)->create(['user_id' => $user->id]);
        $tag->articles()->sync($articles->pluck('id')->all());
    }
}
