<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $primaryKey = 'discussion_id';

    protected $fillable = [
        'discussion_user_id',
        'discussion_project_id',
        'discussion_message',
        'discussion_file'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'discussion_user_id');
    }
}
