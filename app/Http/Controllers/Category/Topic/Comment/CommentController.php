<?php

namespace App\Http\Controllers\Category\Topic\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\Topic\Comment\StoreRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Topic;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreRequest $request, Category $category, Topic $topic)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['topic_id'] = $topic->id;
        Comment::create($data);
        return redirect()->route('categories.topics.show', ['category' => $category->id, 'topic' => $topic->id]);
    }
}
