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
        $data['bank_accounts'] = UserBankAccount::where('user_id', auth()->user()->id)->where('account_type','bank')->get();

        $data['upi_accounts'] = UserBankAccount::where('user_id', auth()->user()->id)->where('account_type','upi')->get();

        return view('user.account_management', ['data' => $data]);
    }
    public function post_create(Request $request)
    {


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
     public function post_upi_create(Request $request)
    {


        $data = new UserBankAccount();
        $data->user_id = auth()->user()->id;

        $data->upi = $request->upi;
        $data->account_type = 'upi';
        $data->save();


        return json_encode([
            'status' => 'success',
            'message' => 'Bank account details saved successfully.',
            'post_data' => $request->all()

        ]);
    }

    public function delete(Request $request)
    {

        UserBankAccount::where('id', $request->id)->delete();

        // return redirect()->route('book_list')->with("success", "delete done");
        return response()->json(['status' => true, 'msg' => 'delete done']);
    }

}
