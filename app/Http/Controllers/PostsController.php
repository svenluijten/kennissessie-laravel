<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * @var Post $posts
     */
    private $posts;

    /**
     * PostsController constructor.
     *
     * @param Post $posts
     */
    public function __construct(Post $posts)
    {
        $this->posts = $posts;
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->posts->with(['author', 'comments'])->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePostRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->slug = str_slug($post->title);
        $post->author()->associate(Auth::user());

        $post->save();

        flash('Post: ' . $post->title . ' created', 'success');

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $input = $request->all();
        $input['slug'] = str_slug($input['title']);

        $post->author()->associate(Auth::id())->update($input);

        flash('Post: ' . $post->title . ' updated', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $post
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $post = $this->posts->findOrFail($post);
        $post->comments()->delete();
        $post->delete();

        flash('Post: ' . $post->title . ' removed', 'success');

        return redirect()->back();
    }
}
