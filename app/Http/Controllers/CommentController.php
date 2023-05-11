<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    public function createComment(Request $request) {
            $incomingFields = $request->validate([
                'body' => 'required'
            ]);

            $incomingFields['body'] = strip_tags($incomingFields['body']);
            $incomingFields['user_id'] = auth()->id();
            Comment::create($incomingFields);
            return redirect('/');
    }
}
