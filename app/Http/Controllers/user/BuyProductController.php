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

        $data['currency_value'] = $currency_value;
        $data['product_id'] = $request->id;
        $data['product_amount'] = $productdata->amount;
        $data['product_widthdraw_perc'] = $productdata->widthdraw_perc;
        $data['product_currency'] = $productdata->currency;
         $data['product_title'] = $productdata->title;

        return view('user.product_buy', $data);
    }
    public function makePayment(Request $request)
    {
        // Validate the request data
        // $request->validate([
        //     'product_id' => 'required|exists:products,id',
        //     'amount' => 'required|numeric|min:0.01',
        //     'currency' => 'required|string',
        // ]);

        // Process the payment logic here
        // For example, you might interact with a payment gateway

        // Redirect back with success message
        // return redirect()->back()->with('success', 'Payment successful for product ID: ' . $request->product_id);
        return       json_encode([
                'status' => 'success',
                'message' => 'Payment successful for product ID: ' . $request->product_id,
                'product_id' => $request->product_id,
                'payment_method' => $request->payment_method,
                'total_amount' => $request->total_amount,
            ]) ;
    }
}
