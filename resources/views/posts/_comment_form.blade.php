<div class="row">
    <div class="col-sm-12">
        <h3>Create comments</h3>
        <form class="form-horizontal" method="POST"
              action="{{ route('comments.store', $post->id) }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                <label for="author" class="col-md-2 control-label">Author</label>

                <div class="col-md-6">
                    <input id="author" type="text" class="form-control" name="author"
                           value="{{ old('author') }}" autofocus>

                    @if ($errors->has('author'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                <label for="body" class="col-md-2 control-label">Comment</label>

                <div class="col-md-6">
                                            <textarea id="body" type="text" class="form-control" name="body"
                                                      autofocus>{{ old('body') }}</textarea>

                    @if ($errors->has('body'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">
                        Create comment
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>