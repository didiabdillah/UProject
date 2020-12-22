<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function faker()
    {
        dd(Carbon::parse('2020-12-25 11:12:13')->isoFormat('dddd, D MMMM Y'));
        // ->isoFormat('dddd, D MMMM Y')
    }
}
