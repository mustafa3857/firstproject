<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table="posts";

    public function user(){
        return $this->belongsTo('App\Models\User');
    } 

    public function comments(){
        return $this->hasMany('App\Models\Comment')->with('user');
    }
}
