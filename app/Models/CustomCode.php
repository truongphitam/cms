<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomCode extends Model
{
    //
    protected $fillable = ['css', 'js', 'between_head', 'after_head', 'after_body'];
}
