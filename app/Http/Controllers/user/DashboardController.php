<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'Dashboard',
        ];

        return view('user.dashboard', ['data' => $data]);
    }
}
