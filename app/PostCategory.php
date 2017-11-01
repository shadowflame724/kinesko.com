<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\Post;


class PostCategory extends Model
{
    protected $table = 'post_categories';

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
