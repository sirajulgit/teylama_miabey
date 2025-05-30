<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserWithdrawlRequest;
use App\Models\CurrencyRate;
use App\Models\User;
use App\Models\UserTransactionHistory;
use Carbon\Carbon;

class TransactionHistoryController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'Purchase History',
        ];
        $data['transdata_7'] = UserTransactionHistory::join('currency_product', 'user_transaction_history.product_id', '=', 'currency_product.id')
         ->join('crypto_app', 'user_transaction_history.crypto_app_id', '=', 'crypto_app.id')
            ->select('user_transaction_history.*', 'currency_product.title','currency_product.amount as unit_amount','crypto_app.name as platform')
            ->where("user_transaction_history.user_id", auth()->user()->id)

            ->where("user_transaction_history.created_at", ">=", Carbon::now()->subDays(7))
            ->orderBy("user_transaction_history.id", "asc")
            ->get();

            $data['transdata_today'] = UserTransactionHistory::join('currency_product', 'user_transaction_history.product_id', '=', 'currency_product.id')
         ->join('crypto_app', 'user_transaction_history.crypto_app_id', '=', 'crypto_app.id')
            ->select('user_transaction_history.*', 'currency_product.title','currency_product.amount as unit_amount','crypto_app.name as platform')
            ->where("user_transaction_history.user_id", auth()->user()->id)

            ->where("user_transaction_history.created_at", ">=", Carbon::now())
            ->orderBy("user_transaction_history.id", "asc")
            ->get();


            $data['transdata_30'] = UserTransactionHistory::join('currency_product', 'user_transaction_history.product_id', '=', 'currency_product.id')
         ->join('crypto_app', 'user_transaction_history.crypto_app_id', '=', 'crypto_app.id')
            ->select('user_transaction_history.*', 'currency_product.title','currency_product.amount as unit_amount','crypto_app.name as platform')
            ->where("user_transaction_history.user_id", auth()->user()->id)

            ->where("user_transaction_history.created_at", ">=", Carbon::now()->subDays(30))
            ->orderBy("user_transaction_history.id", "asc")
            ->get();


        return view('user.transaction_history', ['data' => $data]);
    }

}
