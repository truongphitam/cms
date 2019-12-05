<?php

namespace App\Models;

use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductsCate;
use App\Models\Galley;

class Products extends BaseModel
{
    use MultiLanguage;
    protected $multilingual = ['title', 'expert', 'description', 'meta_title', 'meta_description', 'meta_keywords'];
    protected $fillable = ['title', 'slug', 'image', 'user_id', 'expert', 'description', 'is_published', 'meta_title', 'meta_description', 'meta_keywords'];

    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(ProductsCate::class, 'products_products_cates')->withTimestamps();
    }

    public function galley()
    {
        return $this->hasMany(Galley::class, 'product_id', 'id');
    }
}
