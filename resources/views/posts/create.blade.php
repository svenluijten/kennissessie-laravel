@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Create New Post</h1>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('posts.index') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : null }}">
                                <label for="title">Title:</label>
                                <input name="title" id="title" class="form-control" value="{{ old('title') }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">{{ $errors->first('title') }}</span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('body') ? ' has-error' : null }}">
                                <label for="body">Body:</label>
                                <textarea name="body" id="body" rows="5" class="form-control">{{ old('body') }}</textarea>

                                @if ($errors->has('body'))
                                    <span class="help-block">{{ $errors->first('body') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Create Post" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
