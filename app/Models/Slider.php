<?php

namespace App\Models;

use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class Slider extends BaseModel
{
    //
    use MultiLanguage;
    protected $multilingual = ['title', 'expert', 'description', 'meta_title', 'meta_description', 'meta_keywords'];
    protected $fillable = ['title', 'slug', 'image', 'user_id', 'expert', 'description', 'is_published', 'meta_title', 'meta_description', 'meta_keywords'];

    public function author()
    {
        return $this->belongsTo(Admins::class, 'user_id', 'id');
    }
}
