<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CurrencyRate;
use App\Models\UserWithdrawlRequest;

class WithdrawlRequestController extends Controller
{
    //

    public function index()
    {
        $data = array();
        $data['pageTitle'] = 'Withdrawl Request';
        $data['activePageName'] = 'withdrawl_request';
        $data['activeSubMenu'] = '';
        $currencyitems = CurrencyRate::where("currency","USDT")->get();

        $data['currency_value'] = $currencyitems[0]['currency_value'];

        $items = UserWithdrawlRequest::join('users', 'user_withdrawl_request.user_id', '=', 'users.id')
        ->select('user_withdrawl_request.*', 'users.username')
                ->orderBy("user_withdrawl_request.id", "desc")
                ->get();
        $data['items'] = $items;
        //dd($data['items']);

        return view("admin.withdrawl_request_list", ["data" => $data]);
    }


    public function create()
    {

        $data = array();
        $data['pageTitle'] = 'Add Product';
        $data['activePageName'] = 'product';
        $data['activeSubMenu'] = '';

        return view("admin.product_create", ["data" => $data]);
    }


    public function post_create(Request $request)
    {

        $request->validate([
            'widthdraw_perc' => 'required',
            'amount' => 'required',

        ]);
        $data = new UserWithdrawlRequest();
        $data->widthdraw_perc = $request->widthdraw_perc;
        // $data->price = $request->price;
        $data->amount = $request->amount;

        $data->currency = "USDT";

        $data->save();


        return redirect()->back()->with("success", "Create Successful");
    }


    public function update(Request $request)
    {

        $item = UserWithdrawlRequest::find($request->id);




        $data = array();
        $data['pageTitle'] = 'Product';
        $data['activePageName'] = 'product';
        $data['activeSubMenu'] = '';

        $data['item'] = $item;

        return view("admin.product_edit", ["data" => $data]);
    }


    public function post_update(Request $request)
    {

        $request->validate([
            'widthdraw_perc' => 'required',
            'amount' => 'required',


        ]);




        //////////// order reArrange ///////////



        UserWithdrawlRequest::where("id", $request->id)->update([
            'widthdraw_perc' => $request->widthdraw_perc,

            'amount' => $request->amount,

            'status' => $request->status,
        ]);

        return redirect()->back()->with("success", "Update Successful");
    }


    public function delete(Request $request)
    {

        UserWithdrawlRequest::where('id', $request->id)->delete();

        // return redirect()->route('book_list')->with("success", "delete done");
        return response()->json(['status' => true, 'msg' => 'delete done']);
    }


    public function status_change(Request $request)
    {

        $status = $request->status;
        $status = $status == 1 ? 0 : 1;

        UserWithdrawlRequest::where("id", $request->id)->update([
            'status' => $status,
        ]);

        return response()->json(['status' => true, 'msg' => 'Status Change Successfully']);
    }
}
