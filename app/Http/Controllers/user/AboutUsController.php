<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AboutUsController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'About Us',
        ];


        return view('user.about_us', ['data' => $data]);
    }

}
