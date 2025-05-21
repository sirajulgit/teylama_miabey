<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bibliography;
use Illuminate\Http\Request;

class BibliographyController extends Controller
{
    //

    public function index()
    {
        $data = array();
        $data['pageTitle'] = 'Bibliography';
        $data['activePageName'] = 'bibliography';
        $data['activeSubMenu'] = '';

        $items = Bibliography::orderBy("id", "desc")->get();

        $data['items'] = $items;

        return view("admin.bibliography_list", ["data" => $data]);
    }


    public function create()
    {

        $data = array();
        $data['pageTitle'] = 'Bibliography';
        $data['activePageName'] = 'bibliography';
        $data['activeSubMenu'] = '';

        return view("admin.bibliography_create", ["data" => $data]);
    }


    public function post_create(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);



        $data = new Bibliography();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();


        return redirect()->back()->with("success", "Create Successful");
    }


    public function update(Request $request)
    {

        $item = Bibliography::find($request->id);


        $data = array();
        $data['pageTitle'] = 'Bibliography';
        $data['activePageName'] = 'bibliography';
        $data['activeSubMenu'] = '';

        $data['item'] = $item;

        return view("admin.bibliography_edit", ["data" => $data]);
    }


    public function post_update(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);


        Bibliography::where("id", $request->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->back()->with("success", "Update Successful");
    }


    public function delete(Request $request)
    {

        Bibliography::where('id', $request->id)->delete();

        // return redirect()->route('book_list')->with("success", "delete done");
        return response()->json(['status'=>true,'msg'=>'delete done']);
    }

}
