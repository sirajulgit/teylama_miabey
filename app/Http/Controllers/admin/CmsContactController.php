<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CmsContact;
use Illuminate\Http\Request;

class CmsContactController extends Controller
{
    //


    public function index()
    {
        $data = array();
        $data['pageTitle'] = 'Cms Contact';
        $data['activePageName'] = 'cms';
        $data['activeSubMenu'] = 'cms_contact_page';

        $cmsData = CmsContact::where("id", "1")->get()->toArray();

        // dd($items);

        return view("admin.cms_contact", ["data" => $data, "items" => $cmsData[0]]);  
    }



    public function post_update(Request $request)
    {

        $request->validate([
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        // dd($request->all());

        CmsContact::where("id", '1')->update([
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address
        ]);

        return redirect()->back()->with("success", "Update Successful");
    }
}
