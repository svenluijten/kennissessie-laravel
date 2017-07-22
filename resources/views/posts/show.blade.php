@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-default">Edit</a>
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
            </div>
        </div>
    </div>
@endsection
