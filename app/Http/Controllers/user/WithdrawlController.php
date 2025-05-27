<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserWithdrawlRequest;

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
        public function post_withdrawl_create(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'withdrawl_amount' => 'required',

        ]);





        $data = new UserWithdrawlRequest();
        $data->user_id = auth()->user()->id;
        $data->withdrawl_amount = $request->withdrawl_amount;

        $data->save();


        return redirect()->back()->with("success", "Create Successful");
    }
}
