<?php

namespace App\Policies;

use App\User;
use App\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the comment.
     *
     * @param  \App\User    $user
     * @param  \App\Comment $comment
     *
     * @return mixed
     */
    public function update(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id;
    }

    /**
     * Determine whether the user can delete the comment.
     *
     * @param  \App\User    $user
     * @param  \App\Comment $comment
     *
     * @return mixed
     */
    public function delete(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id;
    }

    /**
     * @param \App\User    $user
     * @param \App\Comment $comment
     *
     * @return bool
     */
    public function author(User $user, Comment $comment)
    {
        return $this->update($user, $comment) && $this->delete($user, $comment);
    }
}
