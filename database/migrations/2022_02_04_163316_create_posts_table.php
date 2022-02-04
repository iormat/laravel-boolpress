<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table -> id();
            $table -> string('title', 60);
            $table -> string('subtitle', 60) -> nullable();
            $table -> string('author', 60);
            $table -> date('publish_date');
            $table -> string('post_image') -> nullable();
            $table -> text('content', 500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
