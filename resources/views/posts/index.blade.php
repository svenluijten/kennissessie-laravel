@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Posts</div>
                    <div class="panel-body">
                        @if($posts->count())
                            <div class="panel-body table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Author</th>
                                        <th>Created at</th>
                                        <th>Actions</th>
                                    </tr>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>
                                                <p>{!! $post->title !!}</p>
                                            </td>
                                            <td>
                                                <p>{!! $post->author->name !!}</p>
                                            </td>
                                            <td>
                                                <p>{!! $post->created_at !!}</p>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="{!! route('posts.show', $post->id) !!}">
                                                            View post: {{ $post->title }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{!! route('posts.edit', $post->id) !!}">Edit post</a>
                                                    </li>
                                                    <li>
                                                        <form action="{!! route('posts.destroy', $post->id) !!}"
                                                              method="POST">
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }}">
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                Delete Post
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    </thead>
                                </table>
                            </div>
                        @else
                            <p>There are no posts available!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
