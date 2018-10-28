<?php

use Faker\Generator as Faker;

$factory->define(\Tjventurini\Tags\App\Models\Tag::class, function (Faker $faker) {
    return [
    	'name' => $faker->unique()->word,
    	'slug' => $faker->unique()->slug,
    	'image' => 'uploads/DSC_0005.JPG',
    	'description' => $faker->text,
    ];
});
