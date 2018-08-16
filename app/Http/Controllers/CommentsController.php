<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Resources\Comment as CommentResource;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $comments = Comment::with('user')->latest()->paginate(10);
        return CommentResource::collection($comments);
    }

    public function store()
    {
        request()->validate([
            'comment' => 'required|max:512'
        ]);

        Comment::create([
            'text' => request('comment'),
            'user_id' => auth()->id()
        ]);
    }

    public function update(Comment $comment)
    {
        request()->validate([
            'comment' => 'required|max:512'
        ]);

        $comment->update(['text' => request('comment')]);
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
    }
}
