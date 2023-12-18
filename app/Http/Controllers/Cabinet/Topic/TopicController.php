<?php

namespace App\Http\Controllers\Cabinet\Topic;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Topic\StoreRequest;
use App\Models\Category;
use App\Models\Topic;
use App\Models\User;

class TopicController extends Controller
{
    public function index(User $user)
    {
        $topics = $user->topics;
        $isPublished = Topic::getStatusPublished();
        return view('cabinet.topic.index', compact('user', 'isPublished', 'topics'));
    }

    public function create(User $user)
    {
        $categories = Category::all();
        return view('cabinet.topic.create', compact('user', 'categories'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Topic::firstOrCreate($data);
        return redirect()->route('users.topics.index', auth()->user()->id);
    }
}
