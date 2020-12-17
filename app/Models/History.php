<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'histories';
    protected $primaryKey = 'history_id';

    protected $fillable = [
        'history_user_id',
        'history_project_id',
        'history_subject',
        'history_verb',
        'history_object',
        'history_icon',
        'history_background',
    ];
}
