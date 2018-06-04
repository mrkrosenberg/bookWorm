<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title' => $faker->text(100),
        'author' => $faker->text(50),
        'pub_date' => $faker->text(50),
        'notes' => $faker->text(50),
    ];
});
