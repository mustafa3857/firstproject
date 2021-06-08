<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('admin_panel');
});  */     

Route::get('/',[PostController::class,'getallpost'])->name('post.allposts');

Route::get('/add-post',[PostController::class,'addpost']);
Route::post('/create-post',[PostController::class,'createpost'])->name('post.create');
Route::get('/posts',[PostController::class,'getpost'])->name('post.useridposts');

Route::get('/posts/{id}',[PostController::class,'getpostbyid']);
Route::get('/delete-post/{id}',[PostController::class,'deletepost']);
Route::get('/update-post/{id}',[PostController::class,'updatepost']);
Route::post('/update-post',[PostController::class,'updatedesirepost'])->name('post.update');


// ONE TO ONE RELATIONSHIP ROUTES

Route::get('/add-user',[UserController::class,'insertrecord']);
Route::get('/get-phone/{id}',[UserController::class,'fetchphonebyuser']);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//for using route as url /name and ->name() must be same
Route::post('/commentsave',[App\Http\Controllers\CommentsController::class,'savecomments'])->name('commentsave');
Route::post('/replysave',[App\Http\Controllers\ReplyController::class,'saveReply'])->name('replysave');



Route::get('/allpostswithcomments',[UserController::class,'allcomments']);

Route::get('/login_posts',[UserController::class,'loginposts']);

Route::group(['middleware'=>['auth','admin']],function(){
    

    Route::get('/admin_panel',function(){
        return view('admin_panel');  
    });
});

Route::get('/reset/{id}',[UserController::class,'reset_view']);

Route::post('/reset',[UserController::class,'resetpassword'])->name('reset');