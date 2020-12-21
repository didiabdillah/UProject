<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $primaryKey = 'member_id';

    protected $fillable = [
        'member_user_id',
        'member_project_id',
        'member_role',
        'member_status'
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'member_project_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'member_user_id');
    }
}
