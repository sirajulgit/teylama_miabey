<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsBanner;

class HomeController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'Home',
        ];

        $items = CmsBanner::where('type', 'home_page')->orderBy("id", "desc")->get();

        $temp_arr = [];
        foreach ($items as $item) {

            $default_image = '/uploads/images/' . $item['image'];

            $item->image = $default_image;

            array_push($temp_arr, $item);
        }

        return view('user.home', ['bannerdata' => $temp_arr, 'data' => $data]);
    }

}
