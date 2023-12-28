<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use HasFactory;
    use SoftDeletes;

    const STATUS_PUBLISHED = 1;

    const STATUS_UNPUBLISHED = 0;

    protected $table = 'topics';

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'user_id',
        'is_published',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
    ];



    public function category()
    {
        return $this->belongsTo(Category::class, 'categiry_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function getStatusPublished()
    {
        return [
            self::STATUS_PUBLISHED => 'Опубликованно',
            self::STATUS_UNPUBLISHED => 'Неопубликованно',
        ];
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'topic_id', 'id');
    }

    public function latestComment() {

        return $this->comments->last();
    }

}
