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
        return view('category.topic.show', compact('category', 'topic', 'comments'));
    }
}
