<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithdrawlController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'Withdrawl',
        ];

        return view('user.withdrawl', ['data' => $data]);
    }
}
