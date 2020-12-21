<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $primaryKey = 'project_id';

    protected $fillable = [
        'project_user_id',
        'project_title',
        'project_description',
        'project_image',
        'project_status',
        'project_finish'
    ];

    public function task()
    {
        return $this->hasMany('App\Models\Task', 'task_project_id');
    }

    public function member()
    {
        return $this->hasMany('App\Models\Member', 'member_project_id');
    }
}
