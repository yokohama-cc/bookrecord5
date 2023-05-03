<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'author' => $faker->name,
        'company' => $faker->company,
        'year_publication' => $faker->dateTimeBetween($startDate = '-110 years', $endDate = 'now')->format('Y'),
        'isbn' => $faker->isbn13,
    ];
});
