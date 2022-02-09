<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Post;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class, 8) -> create() -> each(function($tag){
            $posts = Post::inRandomOrder() -> limit(rand(1, 50)) -> get();
            $tag -> posts() -> attach($posts);
            $tag -> save();
        });
    }
}
