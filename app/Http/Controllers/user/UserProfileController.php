<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'User Profile',
        ];

        return view('user.user_profile', ['data' => $data]);
    }
}
