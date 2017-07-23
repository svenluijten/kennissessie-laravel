<?php

namespace App\Listeners;

use App\Events\PostCreated as PostCreatedEvent;
use App\Mail\Posts\PostCreatedEmail;
use Mail;

class NotifyAuthorSubscriber
{
    /**
     * Handle the event.
     *
     * @param PostCreatedEvent $event
     *
     * @return void
     */
    public function handle(PostCreatedEvent $event)
    {
        $post = $event->post;

        Mail::to($post->author->email)->queue(new PostCreatedEmail($event->post));
    }
}
