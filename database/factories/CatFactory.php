<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name'=>$faker->unique->name,
        'created_at'=>now(),
        'updated_at'=>now()
    ];
});
