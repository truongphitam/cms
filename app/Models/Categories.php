<?php

namespace App\Models;

use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use DB;

class Categories extends BaseModel
{
    //
    use MultiLanguage;
    protected $multilingual = ['title', 'expert', 'description', 'meta_title', 'meta_description', 'meta_keywords'];
    protected $fillable = ['title', 'slug', 'image', 'parent_id', 'user_id', 'expert', 'description', 'is_published', 'meta_title', 'meta_description', 'meta_keywords'];

    public function categories()
    {
        return $this->hasOne(Categories::class, 'id', 'id');
    }

    public function post()
    {
        return $this->belongsToMany(Post::class, 'post_categories')->withTimestamps();
    }

    public static function getNameMultiCate($post_id)
    {
        $return = "";
        $data = DB::table('post_categories')->where('post_id', $post_id)->get();
        if (isset($data) && !empty($data)) {
            foreach ($data as $id => $item) {
                $cate = Categories::find($item->categories_id);
                $return .= $cate->title;
                if ($id < count($data) - 1) {
                    $return .= " , ";
                }
            }
        }
        return $return;
    }
}
