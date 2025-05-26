<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsBanner;

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
        print_r($temp_arr);exit;

        return view('user.dashboard', ['data' => $data]);
    }
}
