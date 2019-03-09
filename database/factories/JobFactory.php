<?php

use Faker\Generator as Faker;

$factory->define(App\Job::class, function (Faker $faker) {
    return [
        'job_name' => $faker->name,
        'job_desc' => $faker->text
    ];
});
