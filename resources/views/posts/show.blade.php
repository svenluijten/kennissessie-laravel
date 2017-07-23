@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @can ('author', $post)
                    <form action="{{ route('posts.show', $post) }}" method="POST" class="form-inline">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-default">Edit</a>
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>

                    <hr>
                @endcan

                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <span class="pull-left">{{ $post->title }}</span>

                        <span class="pull-right label label-info" title="{{ $post->created_at }}">
                            {{ $post->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <div class="panel-body">
                        {{ $post->body }}
                    </div>
                </div>

                @auth
                    <form action="{{ route('comments.store', $post) }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('comment') ? ' has-error' : null }}}">
                            <label for="comment">Comment:</label>
                            <textarea id="comment" class="form-control" name="comment" rows="4">{{ old('comment') ?: null }}</textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Add Comment" class="btn btn-primary">
                        </div>
                    </form>
                @endauth

                @foreach ($comments as $comment)
                    @include ('shared.comment')
                @endforeach

                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection
