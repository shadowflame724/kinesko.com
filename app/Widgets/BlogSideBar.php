<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Portfolio;

class BlogSideBar extends AbstractWidget
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
        $portfolio = Portfolio::with('category')->orderBy('created_at', 'desc')->limit(4)->get();

        return view('widgets.blog-sidebar', [
            'portfolio' => $portfolio,
        ]);
    }
}
