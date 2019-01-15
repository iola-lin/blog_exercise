<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\Lorem($faker));
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph(10),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
