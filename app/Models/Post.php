<?php

namespace App\Models;

use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Admins;

class Post extends BaseModel
{
    //
    use MultiLanguage;
    protected $multilingual = ['title', 'expert', 'description', 'meta_title', 'meta_description', 'meta_keywords'];
    protected $fillable = ['title', 'slug', 'image', 'user_id', 'expert', 'description', 'is_published', 'meta_title', 'meta_description', 'meta_keywords'];

    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'post_categories')->withTimestamps();
    }

    public function author()
    {
        return $this->belongsTo(Admins::class, 'user_id', 'id');
    }
}
