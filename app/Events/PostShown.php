<?php
/**
 * Created by PhpStorm.
 * User: Back-End
 * Date: 31.10.2017
 * Time: 11:34
 */

namespace App\Events;

use App\Post;
use Illuminate\Queue\SerializesModels;

class PostShown
{
    use SerializesModels;

    public $post;

    /**
     * Create a new event instance.
     *
     * @param  Post  $post
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}