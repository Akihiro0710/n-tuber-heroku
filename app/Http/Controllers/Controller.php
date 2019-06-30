<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getCurrentUserId(Request $request)
    {
        $user_id = $request->session()->get('id');
        if (!is_null($user_id)) {
            return $user_id;
        }

        $request->session()->regenerate();
        $request->session()->put('id', uniqid());
        return $request->session()->get('id');
    }

    protected function answeredGender(Request $request, $vtuber_id)
    {
        $user_id = $this->getCurrentUserId($request);
        $vote = Vote::where('vtuber_id', $vtuber_id)->where('user_id', $user_id)->first();
        if (is_null($vote)) {
            return -1;
        }
        return intval($vote->gender);
    }
}
