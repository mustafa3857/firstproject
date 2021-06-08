<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
public function insertrecord(){
    $phone=new Phone();
    $phone->phone="12345678";
    $user=new User();
    $user->name="Mustafa";
    $user->email="gm422929@gmail.com";
    $user->password=encrypt('secret');
    $user->save();
    $user->phone()->save($phone);
    return "Record has been created successfully";
}

public function fetchphonebyuser($id){
    $phone=User::find($id)->phone;
    return $phone;

}

public function allcomments(){
    $posts=Post::with('comments')->get();
    
    return view('allpostswithcomments',compact('posts'));
}

public function loginposts(){
    
    return view('login_posts');
}

public function reset_view($id){
    $user=User::find($id);
    return view('reset',compact('user'));
}

public function resetpassword(Request $request){
    
     
    $validatedData=$request->validate(
        [
            'newpassword' => ['required', 'string', 'min:8'],
            'confirmpassword' => ['required', 'string', 'min:8']
        ]
      );
     $user=User::find($request->id);
     if($request->newpassword==$request->confirmpassword){
     $user->password=Hash::make($request->newpassword);
     $user->save();
        return redirect()->back()->with('message','Password has been updated:');
     }else{
        return redirect()->back()->with('message','Password and confirmed password do not matched:');
     }

  
}

}
