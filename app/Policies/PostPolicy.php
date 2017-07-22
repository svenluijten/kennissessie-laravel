<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     *
     * @return bool
     */
    public function update(User $user, Post $post)
    {
        return $post->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param \App\User $user
     * @param \App\Post $post
     *
     * @return bool
     */
    public function delete(User $user, Post $post)
    {
        return $post->user_id === $user->id;
    }

    /**
     * @param \App\User $user
     * @param \App\Post $post
     *
     * @return bool
     */
    public function author(User $user, Post $post)
    {
        return $this->delete($user, $post) && $this->update($user, $post);
    }
}
