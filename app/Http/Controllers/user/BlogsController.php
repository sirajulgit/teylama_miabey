<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class BlogsController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'Blogs',
        ];


        return view('user.blog', ['data' => $data]);
    }

}
