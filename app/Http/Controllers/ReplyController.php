<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function saveReply(Request $request){
        $reply=new Reply();
        $reply->body=$request->body;
        $reply->comment_id=$request->comment_id;
        $reply->user_id=auth()->user()->id;

        $reply->save();

        $replies=Reply::where('comment_id',$request->comment_id)->with('user')->get();
        return  response()->json($replies);
        
 }
}
