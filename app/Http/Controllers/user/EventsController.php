<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class EventsController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'Events',
        ];


        return view('user.event', ['data' => $data]);
    }

}
