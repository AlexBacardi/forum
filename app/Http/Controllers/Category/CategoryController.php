<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Topic;
use App\Models\User;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $cntCommetns = $this->getCntComment($categories);
        $lstCmmtCtg = $this->getLastCommentByCategory($categories);
        $popularTopics = Topic::withCount('comments')->orderBy('comments_count', 'desc')->get()->take(6);
        return view('main.index', compact('categories', 'cntCommetns', 'lstCmmtCtg', 'popularTopics'));
    }

    public function show(Category $category)
    {
        $topics = $category->topicsOrderDesc()->paginate(10);
        $lstCmt = $this->getLastComment($category->topics);
        $cntCommentUsers = User::withCount('comments')->orderBy('comments_count', 'desc')->get()->take(5);
        return view('category.show', compact('category', 'topics', 'lstCmt', 'cntCommentUsers'));
    }

    private function getCntComment($categories)
    {
        $data = [];
        foreach($categories as $category){
            $data[$category->id] = 0;
            foreach($category->topics as $topic) {
                $data[$category->id] += $topic->comments->count();
            }
        }
        return $data;
    }

    private function getLastComment($categories)
    {
        $data = [];
        foreach($categories as $topic){
            $data[$topic->id] = $topic->latestComment();
        }
        return $data;
    }

    private function getLastCommentByCategory($categories)
    {
        $data = [];
        foreach($categories as $category){
            $data[$category->id] = Comment::getLastComment($category);
        }

        return $data;
    }
}
