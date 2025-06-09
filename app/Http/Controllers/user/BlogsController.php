<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\CmsBanner;
use Illuminate\Http\Request;


class BlogsController extends Controller
{
    //

    public function index(Request $request)
    {
        $data = [
            'page_title' => 'Blogs',
            'activePageName' => 'blog',
            'blog_data' => [],
            'banner_data' => [],
        ];

        $items = Blog::where('status', 'active')->orderBy('id', 'desc')->paginate(6);

        $items->getCollection()->transform(function ($item) {
            if (!is_null($item->image)) {
                $default_image = '/uploads/images/' . $item->image;
                $item->image = $default_image;
            }
            return $item;
        });

        $data['blog_data'] = $items;


        // +++++++++++++++ | CMS BANNER | +++++++++++++++
        $cmsBanner = CmsBanner::where('type', 'blogs_page')->orderBy("id", "asc")->get()->toArray();

        foreach ($cmsBanner as $item) {

            if (!is_null($item['image'])) {
                $default_image = '/uploads/images/' . $item['image'];
                $item['image'] = $default_image;
            }

            array_push($data['banner_data'], $item);
        }



        // dd($data);

        return view('user.blog', ['data' => $data]);
    }


    public function blog_details($slug)
    {

        $data = [
            'page_title' => 'Blog Details',
            'activePageName' => 'blog',
        ];


        $blogData = Blog::where('slug', $slug)->first();

        if(!$blogData){
            return redirect()->back()->with('error', 'Blog not found');
        }

        if($blogData->image){
            $default_image = '/uploads/images/' . $blogData->image;
            $blogData->image = $default_image;
        }

        $data['blog_data'] = $blogData;

        return view('user.blog_detail', ['data' => $data]);
    }
}
