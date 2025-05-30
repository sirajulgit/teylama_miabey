<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserWithdrawlRequest;
use App\Models\CurrencyRate;
use App\Models\User;
use App\Models\UserTransactionHistory;
use Carbon\Carbon;

class PurchaseHistoryController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'Purchase History',
        ];
         $transdata = UserTransactionHistory::join('currency_product', 'user_transaction_history.product_id', '=', 'currency_product.id')
            ->select('user_transaction_history.*', 'currency_product.title','currency_product.amount as unit_amount')
            ->where("user_id", auth()->user()->id)
            ->where("trans_type","credit")
            ->where("created_at", ">=", Carbon::now()->subDays(7))
            ->orderBy("id", "asc")
            ->get();
            dd($transdata);exit;



        return view('user.purchase_history', ['data' => $data]);
    }


}
