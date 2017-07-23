<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <span class="pull-left">Comment by {{ $comment->author->name }}</span>

        <span class="pull-right label label-info" title="{{ $comment->created_at }}">
            {{ $comment->created_at->diffForHumans() }}
        </span>
    </div>

    <div class="panel-body">
        {{ $comment->comment }}
    </div>

    @can ('author', $comment)
        <div class="panel-footer">
            <form action="{{ route('comments.edit', [$post, $comment]) }}" method="POST">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}

                <input type="submit" value="Delete" class="btn btn-danger btn-xs">
                <a href="{{ route('comments.edit', [$post, $comment]) }}" class="btn btn-primary btn-xs">
                    Edit
                </a>
            </form>
        </div>
    @endcan
</div>
