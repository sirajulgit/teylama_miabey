<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsBanner;
use App\Models\CryptoApp;
use App\Models\Product;
use App\Models\CurrencyRate;
use App\Models\PurchaseRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BuyProductController extends Controller
{
    //

    protected $purchaseRequestModel;
    protected $productModel;
    protected $cryptoAppModel;
    protected $currencyRateModel;

    public function __construct()
    {
        $this->purchaseRequestModel = new PurchaseRequest();
        $this->productModel = new Product();
        $this->cryptoAppModel = new CryptoApp();
        $this->currencyRateModel = new CurrencyRate();
    }

    public function index(Request $request)
    {
        //echo $request->id;exit;
        $data = [
            'page_title' => 'Buy USDT',
        ];

        $currencyitems = $this->currencyRateModel->where("currency", "USDT")->get();
        //echo $currencyitems[0]['currency_value'];exit;
        $currency_value = $currencyitems[0]['currency_value'];
        $productdata = $this->productModel->find($request->id);
        $crypto_app_list = $this->cryptoAppModel->getCryptoAppList();


        $data['currency_value'] = $currency_value;
        $data['product_id'] = $request->id;
        $data['product_amount'] = $productdata->amount;
        $data['product_widthdraw_perc'] = $productdata->widthdraw_perc;
        $data['product_currency'] = $productdata->currency;
        $data['product_title'] = $productdata->title;
        $data['crypto_app_list'] = $crypto_app_list;

        return view('user.product_buy', ['data' => $data]);
    }


    public function makePayment(Request $request)
    {

        ///////////// Validated ///////////////////
        $validateData = Validator::make(
            $request->all(),
            [
                'product_id' => 'required|exists:currency_product,id',
                'qnty' => 'required|numeric|min:1',
                'crypto_app_id' => 'required|exists:crypto_app,id',
            ]
        );

        if ($validateData->fails()) {
            return response()->json([
                'status' => false,
                'msg' => 'validation error',
                'errors' => $validateData->errors()
            ], 202);
        }
        ///////////// End Validated ///////////////////

        $productdata = $this->productModel->find($request->product_id);

        $total_amount = $request->qnty * $productdata->amount;

        $result = $this->purchaseRequestModel->create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'qnty' => $request->qnty,
            'crypto_app_id' => $request->crypto_app_id,
            'unit_amount' => $productdata->amount,
            'total_amount' => $total_amount,
            'currency' => $productdata->currency,
        ]);

        return  json_encode([
            'status' => 'success',
            'message' => 'Order placed successfully.',
            'purchase_request_id' => $result->id,
        ]);
    }


    public function paymentQRGenerate($purchase_request_id, Request $request)
    {
        // $request->validate([
        //     'purchase_request_id' => 'required|exists:purchase_request,id',
        // ]);

        $data = [
            'page_title' => 'Payment QR Code',
            'purchase_request_id' => $purchase_request_id,
            'payment_qr_code_img' => asset('uploads/QR/payment-qr.jpg'),
            'payment_qr_code' => "TFY6cHEYSovpyhPg8RJ6zedV12jYvSv8mk",
        ];

        return view('user.payment_qr', ['data' => $data]);
    }
}
