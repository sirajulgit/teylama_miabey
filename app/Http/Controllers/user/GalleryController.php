<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class GalleryController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'Gallery',
            'activePageName' => 'gallery',
        ];


        return view('user.gallery', ['data' => $data]);
    }

}
