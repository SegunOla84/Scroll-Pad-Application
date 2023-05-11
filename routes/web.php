<?php

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    
    $posts = Post::latest()->paginate(); 
    return view('home', ['posts' => $posts]);

   


    // $posts = [];
///////////////////////////////////////////
    //This is to show only a particular User logged in
    //  $posts = auth()->user()->userCoolPosts()->latest()->get();
///////////////////////////////////////////
    //This is to Show Logged in Post
    //$posts = Post::where('user_id', auth()->id())->get();
///////////////////////////////////////////
    // $posts = Post::all();

});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout',[UserController::class, 'logout']);
Route::post('/login',[UserController::class, 'login']);

//Blog Post Related App 



//Post Blog Related App

Route::post('/posted', [BlogController::class, 'createBlog']);
Route::get('ed-post/{post}', [BlogController::class, 'ShowScreen']);
Route::put('ed-post/{post}', [BlogController::class, 'updatedPost']);
Route::delete('delete-post/{post}', [BlogController::class, 'deletePost']);
Route::get('comm-post/{post}', [BlogController::class, 'ShowCommPost']);

$comments = Comment::all();
return view('home', ['comments' => $comments]);


//Comment Related Blog

Route::post('/comments-text', [CommentController::class, 'createComment']);
Route::get('/comments', [CommentController::class, 'index']);



