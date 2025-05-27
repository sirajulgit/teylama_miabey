<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserWithdrawlRequest;
use App\Models\CurrencyRate;
use App\Models\User;

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


        if($request->withdrawl_amount <= auth()->user()->wallet_bal){

         $currencyitems = CurrencyRate::where("currency", "USDT")->get();
        //echo $currencyitems[0]['currency_value'];exit;
        $currency_value = $currencyitems[0]['currency_value'];

        $data = new UserWithdrawlRequest();
        $data->user_id = auth()->user()->id;
        $data->withdrawl_amount = $request->withdrawl_amount;
        $data->withdrawl_amount_inr = $request->withdrawl_amount * $currency_value;
        $data->save();

        $debit_wallet_val= auth()->user()->wallet_bal - $request->withdrawl_amount;
         User::where("id", auth()->user()->id)->update([
            'wallet_bal' => $debit_wallet_val,

        ]);


        return redirect()->back()->with("success", "Withdrawl Request has been Successfully");


        } else {
            return redirect()->back()->with("error", "Invalid Withdrawl Amount!!");
        }
    }
}
