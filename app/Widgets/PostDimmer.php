<?php

namespace App\Widgets;

use App\Post;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;

class PostDimmer extends AbstractWidget
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
        $count = Post::count();
        $string = 'статей -';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-file-text',
            'title'  => "{$string} {$count}",
            'text'   => "В базе данных {$string} {$count}",
            'button' => [
                'text' => 'Все статьи',
                'link' => route('voyager.posts.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }
}
