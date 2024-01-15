<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data['cntCategory'] = Category::all()->count();
        $data['cntUser'] = User::all()->count();
        $data['cntTopic'] = Topic::all()->count();
        $data['cntComment'] = Comment::all()->count();
        return view('admin.index', compact('data'));
    }
}
