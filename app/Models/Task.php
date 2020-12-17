<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = 'task_id';

    protected $fillable = [
        'task_user_id',
        'task_project_id',
        'task_title',
        'task_deadline',
        'task_status',
        'task_finish'
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'task_project_id');
    }
}
