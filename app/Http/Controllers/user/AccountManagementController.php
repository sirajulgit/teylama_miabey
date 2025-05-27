<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\UserBankAccount;

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
    public function post_create(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'bank_name' => 'required',
            'account_holder_name' => 'required',
            'ac_no' => 'required',
            'ifsc_code' => 'required',

        ]);





        $data = new UserBankAccount();
        $data->user_id = auth()->user()->id;
        $data->bank_name = $request->bank_name;
        $data->account_holder_name = $request->account_holder_name;
        $data->ac_no = $request->ac_no;
        $data->ifsc_code = $request->ifsc_code;
        $data->account_type = 'bank';
        $data->save();


        return json_encode([
            'status' => 'success',
            'message' => 'Bank account details saved successfully.',
            'post_data' => $request->all()

        ]);
    }
}
