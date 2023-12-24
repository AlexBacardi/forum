<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'descr',
        'preview_img',
    ];

    public function topics()
    {
        return $this->hasMany(Topic::class, 'category_id', 'id');
    }

    public function topicsOrderDesc()
    {
        return $this->topics()->latest('created_at');
    }

}
