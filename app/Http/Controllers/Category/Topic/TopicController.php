<?php

namespace App\Http\Controllers\Category\Topic;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Topic;

class TopicController extends Controller
{
    public function show(Category $category, Topic $topic)
    {
        $comments  = $topic->comments()->latest('created_at')->get();
        $popularTopics = Topic::withCount('comments')->orderBy('comments_count', 'desc')->get()->take(6);
        return view('category.topic.show', compact('category', 'topic', 'comments', 'popularTopics'));
    }
}
