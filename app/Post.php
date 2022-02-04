<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'subtitle',
        'author',
        'publish_date',
        'post_image',
        'content'
    ];
}
