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


    public function blog_details($slug, Request $request)
    {

        $data = [
            'page_title' => 'Blogs Details',
        ];

        return view('user.blog_detail', ['data' => $data]);
    }
}
