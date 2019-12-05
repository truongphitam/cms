<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admins extends Authenticatable
{
    use Notifiable;
    protected $guard = 'admins';
    protected $fillable = [
        'name', 'email', 'first_name', 'last_name', 'website', 'phone', 'address', 'password', 'role', 'image'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
