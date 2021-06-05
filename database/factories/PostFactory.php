<?php

use pouria\Press\Post;

$factory->define(Post::class, function (Faker\Generator $faker) {
    return [
        'identifier' => str_random(),
        'slug' => str_slug($this->faker->sentence),
        'title' => $this->faker->sentence,
        'body' => $this->faker->paragraph,
        'extra' => json_encode(['test' => 'value']),
    ];
});