<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 70) -> make() -> each(function($post) {

            $category = Category::inRandomOrder() -> limit(1) -> first();
            $post -> category() -> associate($category);
            $post -> save();
        });
    }
}
