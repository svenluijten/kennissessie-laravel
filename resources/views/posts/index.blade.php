@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>All Posts</h1>

                @foreach ($posts as $post)
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <a href="{{ route('posts.show', $post) }}" class="pull-left">{{ $post->title }}</a>

                            <span class="pull-right label label-info" title="{{ $post->created_at }}">
                                {{ $post->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <div class="panel-body">
                            {{ str_limit($post->body, 100) }}
                        </div>
                    </div>
                @endforeach

                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
