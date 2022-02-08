<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // connect posts with categories
        Schema::table('posts', function(Blueprint $table){
            $table -> foreign('category_id', 'posts_category')
                -> references('id')
                -> on('categories');
        });

        Schema::table('post_tag', function (Blueprint $table) {
            $table -> foreign('post_id', 'post_id_tag')
                -> references('id')
                -> on('posts');
            $table -> foreign('tag_id', 'tag_id_post')
                -> references('id')
                -> on('tags');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop posts category foreign
        Schema::table('posts', function(Blueprint $table){
            $table -> dropForeign('posts_category');
        });
        //drop tag_id_post
        Schema::table('post_tag', function(Blueprint $table){
            $table -> dropForeign('post_id_tag');
        });
        //drop post_tag_id
        Schema::table('post_tag', function(Blueprint $table){
            $table -> dropForeign('tag_id_post');
        });
    }
}
