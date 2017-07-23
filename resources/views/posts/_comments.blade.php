@if($post->comments->count())
    <div class="row">
        <div class="col-sm-12">
            <h2>Comments ({!! $post->comments->count() !!}) :</h2>
            <hr>
            @foreach($post->comments as $comment)
                <p>Author: {!! $comment->author !!}</p>
                <p>Comment: {!! $comment->body !!}</p>
                <p>Created at: {!! $comment->created_at !!}</p>
                @if(Auth::user())
                    <form action="{!! route('comments.destroy', $comment->id) !!}"
                          method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger btn-sm">
                            Delete Comment
                        </button>
                    </form>
                @endif
                <hr>
            @endforeach
        </div>
    </div>
@endif