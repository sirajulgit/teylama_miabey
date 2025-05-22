<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\User;

class UserController extends Controller
{
    //

    public function index()
    {
        $data = array();
        $data['pageTitle'] = 'User';
        $data['activePageName'] = 'user';
        $data['activeSubMenu'] = '';

        $items = User::where('user_type', '2')->orderBy("id", "asc")->get();




        $data['items'] = $items;

        return view("admin.user_list", ["data" => $data]);
    }


    public function create()
    {



        $data = array();
        $data['pageTitle'] = 'Add User';
        $data['activePageName'] = 'user';
        $data['activeSubMenu'] = '';



        return view("admin.user_create", ["data" => $data]);
    }


    public function post_create(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password'=>'required'
        ]);





        $data = new User();
        $data->name = $request->name;
        // $data->price = $request->price;
        $data->email = $request->email;

        $data->username = $request->username;
        $data->password = $request->password;
        $data->save();


        return redirect()->back()->with("success", "Create Successful");
    }


    public function update(Request $request)
    {

        $item = User::find($request->id);




        $data = array();
        $data['pageTitle'] = 'User';
        $data['activePageName'] = 'user';
        $data['activeSubMenu'] = '';

        $data['item'] = $item;

        return view("admin.user_edit", ["data" => $data]);
    }


    public function post_update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',

        ]);




        //////////// order reArrange ///////////



        User::where("id", $request->id)->update([
            'name' => $request->name,
            // 'price' => $request->price,
            'email' => $request->email,
            'username' => $request->username,

            'status' => $request->status,
        ]);

        return redirect()->back()->with("success", "Update Successful");
    }


    public function delete(Request $request)
    {

        User::where('id', $request->id)->delete();

        // return redirect()->route('book_list')->with("success", "delete done");
        return response()->json(['status' => true, 'msg' => 'delete done']);
    }


    public function status_change(Request $request)
    {

        $status = $request->status;
        $status = $status == 1 ? 0 : 1;

        User::where("id", $request->id)->update([
            'status' => $status,
        ]);

        return response()->json(['status' => true, 'msg' => 'Status Change Successfully']);
    }
}
