<?php

use App\Models\History;
use Pusher\Pusher;

function insert_history($user_id, $project_id, $subject, $verb, $object, $icon, $background)
{
    $history = [
        'history_user_id' => $user_id,
        'history_project_id' => $project_id,
        'history_subject' =>  $subject,
        'history_verb' => $verb,
        'history_object' => $object,
        'history_icon' => $icon,
        'history_background' => $background
    ];
    History::create($history);
}
