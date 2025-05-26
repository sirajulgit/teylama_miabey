<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsBanner;
use App\Models\Product;
use App\Models\CurrencyRate;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'Dashboard',
        ];

        $items = CmsBanner::where('type', 'home_page')->orderBy("id", "asc")->get();

        $temp_arr = [];
        foreach ($items as $item) {

            $default_image = '/uploads/images/' . $item['image'];

            $item->image = $default_image;

            array_push($temp_arr, $item);
        }
        $currencyitems = CurrencyRate::where("currency", "USDT")->get();
        //echo $currencyitems[0]['currency_value'];exit;
        $currency_value = $currencyitems[0]['currency_value'];
        $productdata = Product::orderBy("id", "asc")->get();


        return view('user.dashboard', 
        ['bannerdata' => $temp_arr, 'currency_value' => $currency_value, 'productdata' => $productdata, 'data' => $data]);
    }
}
