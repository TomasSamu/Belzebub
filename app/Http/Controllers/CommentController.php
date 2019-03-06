<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    
    public function store(Request $request, $id)
    {

        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->text = $request->text;
        $comment->event_id = $id;
        $comment->save();

        redirect(action('EventController@show', $id))->with('success','you posted a new comment');

    }


}
