<?php

namespace App\Models;

use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Products;

class ProductsCate extends Model
{
    //
    use MultiLanguage;
    protected $multilingual = ['title', 'expert', 'description', 'meta_title', 'meta_description', 'meta_keywords'];
    protected $fillable = ['title', 'slug', 'image', 'parent_id', 'user_id', 'expert', 'description', 'is_published', 'meta_title', 'meta_description', 'meta_keywords'];

    public function categories()
    {
        return $this->hasOne(ProductsCate::class, 'id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Products::class, 'products_products_cates')->withTimestamps();
    }

    public static function getNameMultiCate($post_id)
    {
        $return = "";
        $data = DB::table('products_products_cates')->where('products_id', $post_id)->get();
        if (isset($data) && !empty($data)) {
            foreach ($data as $id => $item) {
                $cate = ProductsCate::find($item->products_cate_id);
                $return .= $cate->title;
                if ($id < count($data) - 1) {
                    $return .= " , ";
                }
            }
        }
        return $return;
    }
}
