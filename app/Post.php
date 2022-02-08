<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'category_id',
        'title',
        'subtitle',
        'profile_pic',
        'author',
        'publish_date',
        'post_image',
        'content'
    ];

    public function category() {
        return $this -> belongsTo(Category::class);
    }

    public function tags() {
        return $this -> belongsToMany(Tag::class);
    }
}
