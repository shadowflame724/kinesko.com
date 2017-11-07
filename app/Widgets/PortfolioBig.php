<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use  App\Portfolio;

class PortfolioBig extends AbstractWidget
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

        return view('widgets.portfolio-block-big', [
            'portfolioWidget' => $portfolio,
        ]);
    }
}
