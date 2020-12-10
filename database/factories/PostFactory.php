<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'post_name' => $faker->sentence,
        'post_content' => $faker->text(),
        'post_cid' => $faker->numberBetween(1,5)
    ];
});
