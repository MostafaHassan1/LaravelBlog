<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
        'body'=>$faker->realText($maxNbChars = 200, $indexSize = 3),
        'slug'=>$faker->unique->slug,
        'category_id'=>$faker->numberBetween($min = 1, $max = 3),

        'created_at'=>now(),
        'updated_at'=>now()
    ];
});
