<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LiveSupportController extends Controller
{
    //
    public function index()
    {
        $data = [
            'page_title' => 'Live Support',
        ];

        return view('user.live_support', ['data' => $data]);
    }
}
