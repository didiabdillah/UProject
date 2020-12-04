<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_name', 'user_email', 'user_password', 'user_role', 'user_email_verified_at', 'user_image'
    ];
}
