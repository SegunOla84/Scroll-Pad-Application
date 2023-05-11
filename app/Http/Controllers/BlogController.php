<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{   

    public function ShowCommPost(Post $post) {

        


        return view('comm-post', ['post' => $post]);
    }


    public function deletePost(Post $post) {

        if (auth()->user()->id === $post['user_id']) {
            
            $post->delete();
        }

        return redirect('/');
    }

    Public function updatedPost(Post $post, Request $request) {

        if (auth()->user()->id !== $post['user_id']) {
            
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);
        return redirect('/');
    }


    public function ShowScreen(Post $post) {

        if (auth()->user()->id !== $post['user_id']) {
            
            return redirect('/');
        }


        return view('ed-post', ['post' => $post]);
    }

    public function createBlog(Request $request) {

        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();
        Post::create($incomingFields);
        return redirect('/'); 
    }
}
