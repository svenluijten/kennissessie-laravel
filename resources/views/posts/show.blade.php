@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>{!! $post->title !!}</h1>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <p>{!! $post->body !!}</p>
                                <hr>
                                <p>Author: {!! $post->author->name !!}</p>
                                <p>Created on: {!! $post->created_at !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection