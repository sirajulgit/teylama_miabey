<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Http\Request;

class AwardController extends Controller
{
    //

    public function index()
    {
        $data = array();
        $data['pageTitle'] = 'Award';
        $data['activePageName'] = 'award';
        $data['activeSubMenu'] = '';

        $items = Award::orderBy("id", "desc")->get();

        $temp_arr = [];
        foreach ($items as $item) {

            $default_image = '/uploads/images/' . $item['image'];

            $item->image = $default_image;

            array_push($temp_arr, $item);
        }


        $data['items'] = $temp_arr;

        return view("admin.award_list", ["data" => $data]);
    }


    public function create()
    {

        $data = array();
        $data['pageTitle'] = 'Award';
        $data['activePageName'] = 'award';
        $data['activeSubMenu'] = '';

        return view("admin.award_create", ["data" => $data]);
    }


    public function post_create(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'short_description' => 'required',
            'long_description' => 'required',
        ]);

        // return response()->json(['status' => true, 'validData' => $validData]);

        // dd($request->all());

        $imageName = image_convert_webp($request->image);

        // image_resize($imageName, 148, 221);


        $data = new Award();
        $data->title = $request->title;
        $data->image = $imageName;
        $data->short_description = $request->short_description;
        $data->long_description = $request->long_description;
        $data->save();


        return redirect()->back()->with("success", "Create Successful");
    }


    public function update(Request $request)
    {

        $item = Award::find($request->id);

        $default_image = '/uploads/images/' . $item->image;

        $item->image = $default_image;


        $data = array();
        $data['pageTitle'] = 'Award';
        $data['activePageName'] = 'award';
        $data['activeSubMenu'] = '';

        $data['item'] = $item;

        return view("admin.award_edit", ["data" => $data]);
    }


    public function post_update(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,webp',
            'short_description' => 'required',
            'long_description' => 'required',
            'status' => 'required',
        ]);

        $old_image_name = Award::find($request->id)->image;

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

        Award::where("id", $request->id)->update([
            'title' => $request->title,
            'image' => $imageName,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'status' => $request->status,
        ]);

        return redirect()->back()->with("success", "Update Successful");
    }


    public function delete(Request $request)
    {

        $item = Award::find($request->id);


        $image_path = public_path('uploads/images/' . $item->image);
        $resize_image_path = public_path('uploads/images/resize' . $item->image);

        if (file_exists($image_path)) {
            unlink($image_path);
        }

        if (file_exists($resize_image_path)) {
            unlink($resize_image_path);
        }



        Award::where('id', $request->id)->delete();

        // return redirect()->route('book_list')->with("success", "delete done");
        return response()->json(['status' => true, 'msg' => 'delete done']);
    }
}
