<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountManagementController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'Account Management',
        ];

        return view('user.account_management', ['data' => $data]);
    }
}
