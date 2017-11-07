<?php

namespace App\Widgets;

use App\Post;
use Arrilot\Widgets\AbstractWidget;

class OurMaterial extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $posts = Post::with('author')->with('category')->orderBy('created_at', 'desc')->limit(3)->get();

        return view('widgets.our-materials', [
            'posts' => $posts,
        ]);
    }
}
