<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'cate_name'=> $faker->name,
        'cate_slug' =>$faker->slug(),
    ];
});
