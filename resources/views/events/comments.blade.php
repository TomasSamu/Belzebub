<div class="comment">
    <div class="comment-left">
        <div class="user-avatar">
            {{--                          <img class="img-fluid"
                                src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/user-male-icon.png"/>
    --}} </div>
        <div class="user-name">{{ $comment->user->name }}</div>
    </div>
    <div class="comment-right">
        {{ $comment->text }}
    </div>

</div>


<div class="comments-reply">



    <div class="show-reply">
                <button for="text" data-toggle="collapse" data-target="#comment-reply" aria-expanded="false" aria-controls="comment-reply" class="btn btn-xs btn-green">Reply:</button><br>

        @auth
        <form action="{{action('CommentController@store', $event->id)}}" method="post">
            @csrf

            <div class="form-group" id="comment-reply">
                
                <input type="hidden" name="comment_id" value={{$comment->id}}>
                <textarea name="text" id="comment" cols="50" rows="2"></textarea>
                <button type="submit" value="submit comment" class="btn btn-xs btn-amber">Submit</button>
            </div>
        </form>
        @endauth
    </div>

    @if($comment->replies()->count() > 0)


    @foreach ($comment->replies as $comment)
    @include('events.comments')
    @endforeach
    @endif

</div>
