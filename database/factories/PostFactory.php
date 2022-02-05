<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker ->sentence(3, false),
        'profile_pic' => 'https://picsum.photos/200',
        'subtitle' => $faker -> word(),
        'author' => $faker ->name(),
        'publish_date' => $faker -> date(),
        'post_image' => 'https://picsum.photos/600/350',
        'content' => $faker ->text(200),
    ];
});
