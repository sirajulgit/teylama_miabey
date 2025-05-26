<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsBanner;
use App\Models\Product;
use App\Models\CurrencyRate;

class BuyProductController extends Controller
{
    //

    public function index(Request $request)
    {
        //echo $request->id;exit;
        $data = [
            'page_title' => 'Buy USDT',
        ];

         $currencyitems = CurrencyRate::where("currency","USDT")->get();
       //echo $currencyitems[0]['currency_value'];exit;
        $currency_value = $currencyitems[0]['currency_value'];
        $productdata =Product::find($request->id);
        $data['productdata'] = $productdata;
        $data['currency_value'] = $currency_value;
        $data['product_id'] = $request->id;
        $data['product_amount'] = $productdata->amount;
        $data['product_widthdraw_perc'] = $productdata->widthdraw_perc;
        $data['product_currency'] = $productdata->currency;

        return view('user.product_buy', $data);
    }
}
