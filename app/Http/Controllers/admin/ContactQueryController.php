<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactQuery;
use Illuminate\Http\Request;

class ContactQueryController extends Controller
{
    //

    public function index()
    {
        $data = [
            'pageTitle' => 'Contact Query',
            'activePageName' => 'contact_query',
            'activeSubMenu' => '',
        ];

        $items = ContactQuery::orderBy('created_at', 'desc')->get();

        $data['items'] = $items;


        // dd($data);

        return view('admin.contact_query', ['data' => $data]);
    }
}
