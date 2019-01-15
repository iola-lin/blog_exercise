<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\Lorem($faker));
    return [
        'name' => $faker->word(),
        'user_id' => factory(App\User::class)->create()->id
    ];
});
