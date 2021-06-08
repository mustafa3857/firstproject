<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\PostCreateRequest;

class PostController extends Controller
{



  public function __construct(){
    $this->middleware('auth')->except('getallpost');
  } 


  public function addpost(){
      return view('add-post');
  }
  public function createpost(Request $request){

    //validation perofrm in controller
   $validatedData=$request->validate(
     [
       'title'=>'required|max:255',
       'body'=>'required' ,
       'image'=>'required'
     ]
   );
   $post=new Post();
   $post->title=$request->title;
   $post->body=$request->body;
   $post->user_id=auth()->user()->id;
  // $post->image="default.png";
   $image=$request->file('image');
   if($request->hasFile('image')){
    $imageName = time().'.'.$image->getClientOriginalExtension();
    $image->move(public_path('images'), $imageName);
    $post->image =  $imageName;
   }
    $post->save();
   return  back()->with('message','Post has been created successfully:');

   //first method of saving image in database
 /*  if($request->hasFile('image')){
    $filename=$request->image->getClientOriginalName();
    //$this->deleteimage();
    $request->image->storeAs('images',$filename,'public');
    //auth()->user()->update(['image'=>$filename]);
    $post->image=$filename;
}    */
  



  }

 public function getpost(){
  $posts=auth()->user()->posts->sortBy('id');
   //Using compact we actullay passed our database data to view in which we want to show all data of database
     return view('posts',compact('posts'));
 }

 public function getallpost(){
  $posts=Post::OrderBy('id','asc')->get();
   //Using compact we actullay passed our database data to view in which we want to show all data of database
     return view('allposts',compact('posts'));
 }

 public function getpostbyid($id){
   $post=Post::where('id',$id)->first();
   return view('single-post',compact('post'));
 }

 public function deletepost($id){
   Post::where('id',$id)->delete();
   return back()->with('error','Post has been deleted successfully:');
 }

 public function updatepost($id){
   $post=Post::find($id);
   return view('update-post',compact('post'));
 }

 public function updatedesirepost(Request $request){
  $validatedData=$request->validate(
    [
      'title'=>'required|max:255',
      'body'=>'required'
    ]);
  $post=Post::find($request->id);
   $post->title=$request->title;
   $post->body=$request->body;
   //$post->image="default.png";
   $image=$request->file('image');

   if($request->hasFile('image')){
    $imageName = time().'.'.$image->getClientOriginalExtension();
    $image->move(public_path('images'), $imageName);
    $post->image=$imageName;
}

   $post->save();
   return back()->with('message','Post has been successfully updated:');

 }



/* protected function deleteimage(){
  if(auth()->user()->image){
      Storage::delete('/public/images/'. auth()->user()->image);
  }   
 }    */


}
