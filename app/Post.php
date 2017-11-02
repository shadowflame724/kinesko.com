<?php

namespace App;


class Post extends BaseModel
{

    protected $table = 'posts';

    public function category()
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
