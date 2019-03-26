<div class="comment">
    <div class="comment-head">
        <div class="user-avatar">
            <i class="fas fa-comment"></i></div>
        <div class="user-name">{{ $comment->user->name }}</div>
        <div class="date-posted"> Posted at: {{$comment->created_at}}</div>
    </div>
    <div class="comment-right">
        <div class="comment-text">{{ $comment->text }}    </div>

    <button for="text"class="btn btn-xs btn-green">Reply:</button>
</div>

<div class="show-reply">
        @auth
        <form action="{{action('CommentController@eventCommentStore', $event->id)}}" method="post">
            @csrf

            <div class="form-group reply" id="comment-reply">

                <input type="hidden" name="comment_id" value={{$comment->id}}>
                <textarea name="text" id="comment" class="form-control"></textarea>
                <button type="submit" value="submit comment" class="btn btn-xs btn-amber">Submit</button>
            </div>        
        </form>
        @endauth
    </div>

</div>


<div class="comments-reply">

    @if($comment->replies()->count() > 0)


    @foreach ($comment->replies as $comment)
    @include('events.comments')
    @endforeach
    @endif

</div>
