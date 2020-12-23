<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    protected $fillable = [
        'user_id', 'user_name', 'user_email', 'user_password', 'user_role', 'user_email_verified_at', 'user_image'
    ];

    public function member()
    {
        return $this->hasMany('App\Models\Member', 'member_user_id');
    }

    public function discussion()
    {
        return $this->hasMany('App\Models\Discussion', 'discussion_user_id');
    }
}
