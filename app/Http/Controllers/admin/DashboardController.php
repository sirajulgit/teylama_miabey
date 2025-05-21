<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Visiter;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {

        $bookData = Book::where("status", '1')->get()->toArray();
        $visiterData = Visiter::get()->toArray();



        $data = array();
        $data['pageTitle'] = 'Dashboard';
        $data['activePageName'] = 'dashboard';
        $data['activeSubMenu'] = '';
        $item = [
            'book_count' => count($bookData),
            "visiter_count" => count($visiterData)
        ];

        return view('admin.dashboard', ['data' => $data, 'item' => $item]);
    }
}
