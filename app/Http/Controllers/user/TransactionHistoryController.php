<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserWithdrawlRequest;
use App\Models\CurrencyRate;
use App\Models\User;

class TransactionHistoryController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'Purchase History',
        ];


        return view('user.transaction_history', ['data' => $data]);
    }

}
