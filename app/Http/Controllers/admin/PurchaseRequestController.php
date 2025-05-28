<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CurrencyRate;
use App\Models\PurchaseRequest;
use App\Models\UserTransactionHistory;
use App\Models\User;

class PurchaseRequestController extends Controller
{
    //

    public function index()
    {
        $data = array();
        $data['pageTitle'] = 'Purchase Request';
        $data['activePageName'] = 'purchase_request';
        $data['activeSubMenu'] = '';
        $currencyitems = CurrencyRate::where("currency","USDT")->get();
       //echo $currencyitems[0]['currency_value'];exit;
        $data['currency_value'] = $currencyitems[0]['currency_value'];

    $items = PurchaseRequest::join('users', 'purchase_request.user_id', '=', 'users.id')
    ->select('purchase_request.*', 'users.username')
            ->orderBy("purchase_request.id", "desc")
            ->where("payment_status","pending")
            ->get();
        $data['items'] = $items;
        //dd($data['items']);

        return view("admin.purchase_request_list", ["data" => $data]);
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
        $data = new Product();
        $data->widthdraw_perc = $request->widthdraw_perc;
        // $data->price = $request->price;
        $data->amount = $request->amount;

        $data->currency = "USDT";

        $data->save();


        return redirect()->back()->with("success", "Create Successful");
    }


    public function update(Request $request)
    {

        $item = PurchaseRequest::find($request->id);




        $data = array();
        $data['pageTitle'] = 'Product';
        $data['activePageName'] = 'product';
        $data['activeSubMenu'] = '';

        $data['item'] = $item;

        return view("admin.purchase_request_edit", ["data" => $data]);
    }


    public function post_update(Request $request)
    {



        $purchase_request_data = PurchaseRequest::find($request->id);
         $user_data = User::find(auth()->user()->id);
        //dd($purchase_request_data);exit;
        //////////// order reArrange ///////////



        PurchaseRequest::where("id", $request->id)->update([


            'payment_status' => $request->payment_status,
        ]);
        if($request->payment_status=="complete"){
            $data = new UserTransactionHistory();
            $data->user_id = $purchase_request_data->user_id;
            // $data->price = $request->price;
            $data->trans_type = "credit";
            $data->product_id = $purchase_request_data->product_id;
             $data->crypto_app_id = $purchase_request_data->crypto_app_id;
              $data->qnty = $purchase_request_data->qnty;


            $data->amount = $purchase_request_data->total_amount;
            $data->payment_status = "complete";
            $data->save();



            User::where("id", $purchase_request_data->user_id)->update([
            'wallet_bal' => $user_data->wallet_bal  + $purchase_request_data->total_amount,

            ]);


        }

        return redirect()->back()->with("success", "Update Successful");
    }


    public function delete(Request $request)
    {

        Product::where('id', $request->id)->delete();

        // return redirect()->route('book_list')->with("success", "delete done");
        return response()->json(['status' => true, 'msg' => 'delete done']);
    }


    public function status_change(Request $request)
    {

        $status = $request->status;
        $status = $status == 1 ? 0 : 1;

        Product::where("id", $request->id)->update([
            'status' => $status,
        ]);

        return response()->json(['status' => true, 'msg' => 'Status Change Successfully']);
    }
}
