<?php

use Faker\Generator as Faker;

$factory->define(App\ReadingRecord::class, function (Faker $faker) {
    return [
        'book_id'  => $faker->numberBetween($min = 1, $max = 100),
        'reader_id'  => $faker->numberBetween($min = 1, $max = 10),
        'year_read' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')->format('Y'),
        'month_read' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')->format('m'),
        'report' => $faker->realText($maxNbChars = 255, $indexSize = 2),
    ];
});
