@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>All Posts</h1>

                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <span class="pull-left">Post Title</span>

                        <span class="pull-right label label-info">3 minutes ago</span>
                    </div>

                    <div class="panel-body">
                        Part of the post body. Maybe the first 100 characters?
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <span class="pull-left">Post Title</span>

                        <span class="pull-right label label-info">4 days ago</span>
                    </div>

                    <div class="panel-body">
                        Part of the post body. Maybe the first 100 characters?
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <span class="pull-left">Post Title</span>

                        <span class="pull-right label label-info">1 year ago</span>
                    </div>

                    <div class="panel-body">
                        Part of the post body. Maybe the first 100 characters?
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
