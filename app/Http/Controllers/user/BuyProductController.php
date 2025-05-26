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

    public function index()
    {
        $data = [
            'page_title' => 'Buy USDT',
        ];

         $currencyitems = CurrencyRate::where("currency","USDT")->get();
       //echo $currencyitems[0]['currency_value'];exit;
        $currency_value = $currencyitems[0]['currency_value'];
        $productdata = Product::orderBy("id", "asc")->get();


        return view('user.product_buy', []);
    }
}
