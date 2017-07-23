<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;

class PostsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::latest()->paginate(20);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * @param \App\Post $post
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        $comments = $post->comments()->latest()->paginate(3);

        return view('posts.show', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * @param \App\Http\Requests\CreatePostRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePostRequest $request)
    {
        $post = auth()->user()->posts()->create(
            $request->only(['title', 'body'])
        );

        return redirect()->route('posts.show', $post);
    }

    /**
     * @param \App\Post $post
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * @param \App\Post                            $post
     * @param \App\Http\Requests\UpdatePostRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Post $post, UpdatePostRequest $request)
    {
        $this->authorize('update', $post);

        $post->update($request->only(['title', 'body']));

        return redirect()->route('posts.show', $post);
    }

    /**
     * @param \App\Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('posts.index');
    }
}
