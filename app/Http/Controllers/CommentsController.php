<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\Comments\CreateCommentRequest;
use App\Post;

class CommentsController extends Controller
{
    /**
     * @var Post $post
     */
    private $post;

    /**
     * @var Comment $comment
     */
    private $comment;

    /**
     * CommentsController constructor.
     *
     * @param Post $post
     * @param Comment $comment
     */
    public function __construct(Post $post, Comment $comment)
    {
        $this->post = $post;
        $this->comment = $comment;
    }

    /**
     * Create a comment of a Post
     *
     * @param CreateCommentRequest $request
     *
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateCommentRequest $request, $post)
    {
        $post = $this->post->findOrFail($post);
        $input = $request->all();
        $input['post_id'] = $post->id;

        $this->comment->create($input);

        flash('Comment: ' . $post->title . ' created', 'success');

        return redirect()->back();
    }

    /**
     * Delete a comment of a Post
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $comment = $this->comment->findOrFail($id);
        $comment->delete();

        flash('Comment: ' . $comment->title . ' removed', 'success');

        return redirect()->back();
    }
}
