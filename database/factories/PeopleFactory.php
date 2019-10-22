<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\People;
use Faker\Generator as Faker;

$factory->define(People::class, function (Faker $faker) {
    return [
        'name'=>$faker->name('male'|'female'),
        'email'=>$faker->unique()->email,
        'password'=>md5('Hello123@'),
        'salary'=>$faker->numberBetween($min=1000,$max=10000),
        'birth_date'=>$faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null)

    ];
});
