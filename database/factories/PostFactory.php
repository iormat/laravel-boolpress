<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker ->sentence(3, false),
        'subtitle' => $faker -> word(),
        'author' => $faker ->name(),
        'publish_date' => $faker -> date(),
        'post_image' => $faker -> optional() -> url(),
        'content' => $faker ->text(1000),
    ];
});
