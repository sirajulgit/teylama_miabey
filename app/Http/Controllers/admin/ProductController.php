<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CurrencyRate;

class ProductController extends Controller
{
    //

    public function index()
    {
        $data = array();
        $data['pageTitle'] = 'Product';
        $data['activePageName'] = 'product';
        $data['activeSubMenu'] = '';
        $currencyitems = CurrencyRate::where("currency","USDT")->get();
       //echo $currencyitems[0]['currency_value'];exit;
        $data['currency_value'] = $currencyitems[0]['currency_value'];
        $items = Product::orderBy("id", "asc")->get();
        $data['items'] = $items;

        return view("admin.product_list", ["data" => $data]);
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

        $item = Product::find($request->id);




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
