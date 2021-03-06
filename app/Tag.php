<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'tag_name',
        'description'
    ];

    public function posts() {
        return $this -> belongsToMany(Post::class);
    }
}
