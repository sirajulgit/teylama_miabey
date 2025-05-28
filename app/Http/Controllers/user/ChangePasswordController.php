<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserWithdrawlRequest;
use App\Models\CurrencyRate;
use App\Models\User;

class ChangePasswordController extends Controller
{

    public function index()
    {
        $data = [
            'page_title' => 'Change Password',
        ];
        return view('user.change_password', ['data' => $data]);
    }


}
