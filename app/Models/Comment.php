<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'comments';

    protected $fillable = [
        'user_id',
        'topic_id',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id', 'id');
    }

    public static function getLastComment(Category $category)
    {
        return static::query()->whereHas('topic', function(Builder $query) use ($category){
            $query->where('category_id', $category->id);
        })->latest()->first();
    }
}
