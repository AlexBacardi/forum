<?php

namespace App\Http\Controllers\Category\Topoc;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function show(Category $category, Topic $topic)
    {
        return view('category.topic.show', compact('category', 'topic'));
    }
}
