<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'id_card' => $faker->isbn13,
        'address' => $faker->text(25),
        'phone' => $faker->phoneNumber,
        'user_id' => 1
    ];
});
