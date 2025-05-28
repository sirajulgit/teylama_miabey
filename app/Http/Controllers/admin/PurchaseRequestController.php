<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CurrencyRate;
use App\Models\PurchaseRequest;

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

        $request->validate([
            'widthdraw_perc' => 'required',
            'amount' => 'required',


        ]);




        //////////// order reArrange ///////////



        Product::where("id", $request->id)->update([
            'widthdraw_perc' => $request->widthdraw_perc,

            'amount' => $request->amount,

            'status' => $request->status,
        ]);

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
