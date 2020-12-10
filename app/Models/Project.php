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
}
