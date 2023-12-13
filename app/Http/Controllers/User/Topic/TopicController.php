<?php

namespace App\Http\Controllers\User\Topic;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Topic\StoreRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index(User $user)
    {
        return view('user.topic.index', compact('user'));
    }

    public function create(User $user)
    {
        $categories = Category::all();
        return view('user.topic.create', compact('user', 'categories'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        dd($data);
    }
}
