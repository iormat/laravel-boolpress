<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];

    public function posts() {
        return $this -> hasMany(Post::class);
    }
}
