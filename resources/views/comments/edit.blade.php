@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Edit Comment</h1>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="{{ route('comments.edit', [$post, $comment]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : null }}">
                                <label for="comment">Comment:</label>
                                <textarea name="comment" id="comment" class="form-control" rows="4">{{ old('comment') ?: $comment->comment }}</textarea>

                                @if ($errors->has('comment'))
                                    <span class="help-block">{{ $errors->first('comment') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Update Comment" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
