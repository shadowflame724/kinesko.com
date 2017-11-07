<?php

namespace App\Listeners;

use App\Events\PostShown;

class PostEventListener
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
     * @param  PostShown  $event
     * @return void
     */
    public function handle(PostShown $event)
    {
        $event->post->views += 1;
        $event->post->save();
    }
}
