<?php

namespace App\Service\Category\Topic\Comment;

use App\Models\Comment;
use Exception;
use Illuminate\Support\Facades\DB;

class CommentService
{
    public function create($data, $topic)
    {
        try{
            DB::beginTransaction();
            $data['user_id'] = auth()->user()->id;
            $data['topic_id'] = $topic->id;
            Comment::create($data);
            $topic->touch();
            DB::commit();
        } catch(\Exception $exception){
            DB::rollBack();
            return false;
        }
        return true;
    }
}
