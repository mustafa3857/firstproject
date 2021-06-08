<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

use App\Models\User;

class CommentsController extends Controller
{
    public function savecomments(Request $request){
           $comment=new Comment();
           $comment->body=$request->body;
           $comment->post_id=$request->post_id;
           $comment->user_id=auth()->user()->id;


           $comment->save();
           $comments=Comment::where('post_id',$request->post_id)->with('user')->get();
           return  response()->json($comments);
          
        }
}
