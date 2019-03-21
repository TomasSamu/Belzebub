

                <div class="comment">   
                    <div class="comment-left">
                        <div class="user-avatar">
    {{--                          <img class="img-fluid"
                                src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/user-male-icon.png"/>
    --}}                     </div>
                        <div class="user-name">{{ $comment->user->name }}</div>
                    </div>
                    <div class="comment-right">
                        {{ $comment->text }}
                    </div>

                </div>
                
                <div class="comments-reply" style="padding-left: 50px;">
                    @auth
                        <form action="{{action('CommentController@store', $event->id)}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="text">Reply:</label><br>
                                <input type="hidden" name="comment_id" value={{$comment->id}}>
                                <textarea name="text" id="comment" cols="50" rows="5"></textarea>
                            </div>
                        
                            <div class="form-group">
                                <input type="submit" value="submit comment">
                            </div>
                        </form>
                    @endauth

                    @if($comment->replies()->count() > 0)


                        @foreach ($comment->replies as $comment)
                            @include('events.comments')
                        @endforeach
                    @endif

                </div>
