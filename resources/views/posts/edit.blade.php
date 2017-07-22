@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Edit Post</h1>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('posts.show', $post) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input name="title" id="title" class="form-control" value="{{ $post->title }}">
                            </div>

                            <div class="form-group">
                                <label for="body">Body:</label>
                                <textarea name="body" id="body" rows="5" class="form-control">{{ $post->body }}</textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Update Post" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
