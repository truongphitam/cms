<?php

namespace App\Models;

use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class Galley extends BaseModel
{
    //
    use MultiLanguage;
    protected $multilingual = ['title', 'meta_title', 'meta_description', 'meta_keywords'];
    protected $fillable = ['title', 'image', 'user_id', 'meta_title', 'meta_description', 'meta_keywords'];
}
