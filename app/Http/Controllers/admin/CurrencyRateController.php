<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\CurrencyRate;

class CurrencyRateController extends Controller
{
    //

    public function index()
    {
        $data = array();
        $data['pageTitle'] = 'Currency Rate';
        $data['activePageName'] = 'currency';
        $data['activeSubMenu'] = '';

        $items = CurrencyRate::orderBy("id", "asc")->get();
        $data['items'] = $items;

        return view("admin.currency_rate_list", ["data" => $data]);
    }


    public function create()
    {

        $data = array();
        $data['pageTitle'] = 'Add Currency';
        $data['activePageName'] = 'currency';
        $data['activeSubMenu'] = '';

        return view("admin.currency_rate_create", ["data" => $data]);
    }


    public function post_create(Request $request)
    {

        $request->validate([
            'widthdraw_perc' => 'required',
            'amount' => 'required',

        ]);
        $data = new CurrencyRate();
        $data->currency = $request->currency;
        // $data->price = $request->price;
        $data->currency_value = $request->currency_value;



        $data->save();


        return redirect()->back()->with("success", "Create Successful");
    }


    public function update(Request $request)
    {

        $item = CurrencyRate::find($request->id);




        $data = array();
        $data['pageTitle'] = 'Currency Rate';
        $data['activePageName'] = 'currency';
        $data['activeSubMenu'] = '';

        $data['item'] = $item;

        return view("admin.currency_rate_edit", ["data" => $data]);
    }


    public function post_update(Request $request)
    {

        $request->validate([
            'currency_value' => 'required',


        ]);




        //////////// order reArrange ///////////



        CurrencyRate::where("id", $request->id)->update([
            'currency_value' => $request->currency_value,

        ]);

        return redirect()->back()->with("success", "Update Successful");
    }


    public function delete(Request $request)
    {

        CurrencyRate::where('id', $request->id)->delete();

        // return redirect()->route('book_list')->with("success", "delete done");
        return response()->json(['status' => true, 'msg' => 'delete done']);
    }


    public function status_change(Request $request)
    {

        $status = $request->status;
        $status = $status == 1 ? 0 : 1;

        CurrencyRate::where("id", $request->id)->update([
            'status' => $status,
        ]);

        return response()->json(['status' => true, 'msg' => 'Status Change Successfully']);
    }
}
