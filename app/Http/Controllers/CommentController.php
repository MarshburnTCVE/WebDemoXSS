<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        
        $comments = Comment::latest()->get();

        return view('comments.index', compact('comments'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'author' => ['required', 'string', 'max:255'],
            'comment' => ['required', 'string'],
        ]);

        Comment::create([
            'author' => $request->author,
            'comment' => $request->comment,
        ]);

        return redirect()->route('comments.index');
    }
}
