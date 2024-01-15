<?php

namespace App\Http\Controllers\Cabinet\Comment;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(User $user)
    {
        return view('cabinet.comment.index', compact('user'));
    }
}
