<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{

    public function show($id)
    {


    }
    
    public function eventCommentStore(Request $request, $id)
    {
        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->text = $request->text;
        $comment->event_id = $id;
        $comment->comment_id = $request->comment_id;
        $comment->save();

        return back()->with('success','you posted a new comment');

    }

     public function gameCommentStore(Request $request, $id)
    {
        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->text = $request->text;
        $comment->board_game_id = $id;
        $comment->comment_id = $request->comment_id;
        $comment->save();

        return back()->with('success','you posted a new comment');
    }

    public function locationCommentStore(Request $request, $id)
    {
        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->text = $request->text;
        $comment->location_id = $id;
        $comment->comment_id = $request->comment_id;
        $comment->save();

        return back()->with('success','you posted a new comment');
    }

    public function offerCommentStore(Request $request, $id)
    {
        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->text = $request->text;
        $comment->offer_id = $id;
        $comment->comment_id = $request->comment_id;
        $comment->save();

        return back()->with('success','you posted a new comment');
    }


}
