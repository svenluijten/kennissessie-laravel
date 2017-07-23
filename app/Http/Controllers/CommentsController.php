<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Post;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CreateCommentRequest $request
     * @param \App\Post                               $post
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCommentRequest $request, Post $post)
    {
        $post->comments()->create([
            'comment' => $request->get('comment'),
        ]);

        return redirect()->route('posts.show', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post    $post
     * @param \App\Comment $comment
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Comment $comment)
    {
        $this->authorize('edit', $comment);

        return view('comments.edit', [
            'comment' => $comment,
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCommentRequest $request
     * @param \App\Post                               $post
     * @param \App\Comment                            $comment
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Post $post, Comment $comment)
    {
        $this->authorize('edit', $comment);

        $comment->update([
            'comment' => $request->get('comment'),
        ]);

        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post    $post
     * @param \App\Comment $comment
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Post $post, Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return redirect()->route('posts.show', $post);
    }
}
