<?php

namespace App\Http\Controllers\Cabinet\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(User $user)
    {
        $userComments = $user->comments()->latest('created_at')->paginate(5);
        return view('cabinet.comment.index', compact('userComments', 'user'));
    }

    public function edit(User $user, Comment $comment)
    {
        return view('cabinet.comment.edit', compact('comment', 'user'));
    }

    public function update( User $user, Comment $comment, Request $request)
    {
        $data = $request->validate(['message' => ['required']]);
        $comment->update($data);
        return redirect()->route('categories.topics.show',['category' => $comment->topic->category_id, 'topic' => $comment->topic->id]);
    }

    public function delete(User $user, Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}
