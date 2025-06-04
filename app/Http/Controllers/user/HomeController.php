<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'Home',
        ];


        return view('user.home', ['data' => $data]);
    }

}
