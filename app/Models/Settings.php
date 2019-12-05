<?php

namespace App\Models;

use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Model;

class Settings extends BaseModel
{
    //
    use MultiLanguage;
    protected $multilingual = ['title', 'expert', 'description', 'meta_title', 'meta_description', 'meta_keywords'];
    protected $fillable = ['title', 'image', 'phone', 'hotline', 'email', 'fax', 'twitter', 'facebook', 'plus', 'pinterest', 'linkedin', 'tumblr', 'instagram', 'user_id', 'expert', 'description', 'meta_title', 'meta_description', 'meta_keywords'];
}
