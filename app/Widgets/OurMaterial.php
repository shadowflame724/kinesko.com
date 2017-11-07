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
        $posts = Post::with('author')->with('category')->get()->sortBy('created_at')->take(3);

        return view('widgets.our-materials', [
            'posts' => $posts,
        ]);
    }
}
