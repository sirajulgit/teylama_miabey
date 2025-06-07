<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;


class BlogsController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'Blogs',
            'activePageName' => 'blog',
        ];

        $items = Blog::orderBy('id', 'desc')->paginate(1);

        $items->getCollection()->transform(function ($item) {
            if (!is_null($item->image)) {
                $default_image = '/uploads/images/' . $item->image;
                $item->image = $default_image;
            }
            return $item;
        });

        $data['blog_data'] = $items;

        // dd($data);

        return view('user.blog', ['data' => $data]);
    }


    public function blog_details($slug, Request $request)
    {

        $data = [
            'page_title' => 'Blogs Details',
            'activePageName' => 'blog',
        ];

        return view('user.blog_detail', ['data' => $data]);
    }
}
