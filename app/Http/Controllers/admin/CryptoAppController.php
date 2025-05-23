<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\CryptoApp;

class CryptoAppController extends Controller
{
    //

    public function index()
    {
        $data = array();
        $data['pageTitle'] = 'CryptoApp';
        $data['activePageName'] = 'crypto';
        $data['activeSubMenu'] = '';

        $items = CryptoApp::orderBy("id", "asc")->get();

        $temp_arr = [];
        foreach ($items as $item) {

            $default_image = '/uploads/images/' . $item['brand_image'];

            $item->brand_image = $default_image;

            array_push($temp_arr, $item);
        }


        $data['items'] = $temp_arr;

        return view("admin.crypto_app_list", ["data" => $data]);
    }


    public function create()
    {



        $data = array();
        $data['pageTitle'] = 'CryptoApp';
        $data['activePageName'] = 'crypto';
        $data['activeSubMenu'] = '';



        return view("admin.crypto_app_create", ["data" => $data]);
    }


    public function post_create(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required',

            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'tutorial_video_url' => 'required|url',

        ]);

        // $items = Book::where("order_no", $request->order_no)->get()->toArray();
        // if(count($items)>0)
        // {
        // }


        // return response()->json(['status' => true, 'validData' => $validData]);

        // dd($request->all());

        $imageName = image_convert_webp($request->image);

        // image_resize($imageName, 148, 221);


        $data = new CryptoApp();
        $data->name = $request->name;
        $data->tutorial_video_url = $request->tutorial_video_url;
        $data->brand_image = $imageName;
        $data->save();


        return redirect()->back()->with("success", "Create Successful");
    }


    public function update(Request $request)
    {

        $item = CryptoApp::find($request->id);

        $default_image = '/uploads/images/' . $item->brand_image;

        $item->brand_image = $default_image;


        $data = array();
        $data['pageTitle'] = 'Book';
        $data['activePageName'] = 'book';
        $data['activeSubMenu'] = '';

        $data['item'] = $item;

        return view("admin.crypto_app_edit", ["data" => $data]);
    }


    public function post_update(Request $request)
    {

        $request->validate([
             'name' => 'required',

            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'tutorial_video_url' => 'required|url',
        ]);

        $old_image_name = CryptoApp::find($request->id)->brand_image;

        if ($request->image) {

            $imageName = image_convert_webp($request->image);

            // image_resize($imageName, 148, 221);

            $image_path = public_path('uploads/images/' . $old_image_name);
            $resize_image_path = public_path('uploads/images/resize' . $old_image_name);

            if (file_exists($image_path)) {
                unlink($image_path);
            }

            if (file_exists($resize_image_path)) {
                unlink($resize_image_path);
            }
        } else {

            $imageName = $old_image_name;
        }


        //////////// order reArrange ///////////


        CryptoApp::where("id", $request->id)->update([
            'name' => $request->name,
            // 'price' => $request->price,
            'tutorial_video_url' => $request->tutorial_video_url,
            'brand_image' => $imageName,

            'status' => $request->status,
        ]);

        return redirect()->back()->with("success", "Update Successful");
    }


    public function delete(Request $request)
    {

        $item = CryptoApp::find($request->id);


        $image_path = public_path('uploads/images/' . $item->brand_image);
        $resize_image_path = public_path('uploads/images/resize' . $item->brand_image);

        if (file_exists($image_path)) {
            unlink($image_path);
        }

        if (file_exists($resize_image_path)) {
            unlink($resize_image_path);
        }



        CryptoApp::where('id', $request->id)->delete();

        // return redirect()->route('book_list')->with("success", "delete done");
        return response()->json(['status' => true, 'msg' => 'delete done']);
    }



}
