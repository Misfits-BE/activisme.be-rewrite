<?php

use App\Models\Category;
use App\User;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'author_id' => factory(User::class)->create()->id, 
        'slug' => $faker->slug,
        'name' => $faker->name,
        'description' => $faker->text,
    ];
});
