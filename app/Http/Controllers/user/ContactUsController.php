<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ContactUsController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'Contact Us',
            'activePageName' => 'contact_us',
        ];


        return view('user.contact_us', ['data' => $data]);
    }

}
