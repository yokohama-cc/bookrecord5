<?php


use Faker\Generator as Faker;

$factory->define(App\Reader::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'name' => $faker->name,
        'school_number' => $faker->bothify('######?'),
        'admission_year' => $faker->numberBetween($min = 2013, $max = 2018),
        'department_id' => $faker->numberBetween($min = 1, $max = 3),
        
    ];
});
