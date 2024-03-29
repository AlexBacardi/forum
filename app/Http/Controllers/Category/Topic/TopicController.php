<?php

namespace App\Http\Controllers\Category\Topic;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Topic;
use App\Policies\Category\Topic\UnpublishedTopicPolicy;
use Illuminate\Auth\Access\Response;

class TopicController extends Controller
{
    public function show(Category $category, Topic $topic)
    {
        $comments  = $topic->comments()->latest('created_at')->get();
        $statusPublished = Topic::getStatusPublished();
        $popularTopics = Topic::withCount('comments')->orderBy('comments_count', 'desc')->get()->take(6);
        return view('category.topic.show', compact('category', 'topic', 'comments', 'popularTopics', 'statusPublished'));
    }
}
