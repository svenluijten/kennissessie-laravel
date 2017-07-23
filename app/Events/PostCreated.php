<?php

namespace App\Events;

use App\Post;
use Illuminate\Queue\SerializesModels;

class PostCreated
{
    use SerializesModels;

    public $post;

    /**
     * PostCreated constructor.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}
