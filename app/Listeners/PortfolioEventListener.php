<?php

namespace App\Listeners;

use App\Events\PortfolioShown;

class PortfolioEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PortfolioShown  $event
     * @return void
     */
    public function handle(PortfolioShown $event)
    {
        $event->portfolio->views += 1;
        $event->portfolio->save();
    }
}
