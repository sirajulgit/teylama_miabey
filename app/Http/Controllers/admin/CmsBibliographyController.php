<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CmsBanner;
use Illuminate\Http\Request;

class CmsBibliographyController extends Controller
{
    //

    public function index()
    {
        $data = array();
        $data['pageTitle'] = 'Cms Bibliography Banner';
        $data['activePageName'] = 'banner';
        $data['activeSubMenu'] = 'cms_bibliography_banner';

        $items = CmsBanner::where('type', 'bibliography_page')->orderBy("id", "asc")->get();

        $temp_arr = [];
        foreach ($items as $item) {

            $default_image = '/uploads/images/' . $item['image'];

            $item->image = $default_image;

            array_push($temp_arr, $item);
        }


        $data['items'] = $temp_arr;

        return view("admin.cms_bibliography_banner_list", ["data" => $data]);
    }


    public function create()
    {

        $data = array();
        $data['pageTitle'] = 'Cms Banner';
        $data['activePageName'] = 'banner';
        $data['activeSubMenu'] = 'cms_bibliography_banner';

        return view("admin.cms_bibliography_banner_create", ["data" => $data]);
    }


    public function post_create(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'type' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
        ]);

        // return response()->json(['status' => true, 'validData' => $validData]);

        // dd($request->all());

        $imageName = image_convert_webp($request->image,85);

        // image_resize($imageName, 148, 221);


        $data = new CmsBanner();
        $data->type = $request->type;
        $data->image = $imageName;
        $data->save();


        return redirect()->back()->with("success", "Create Successful");
    }


    public function update(Request $request)
    {

        $item = CmsBanner::find($request->id);

        $default_image = '/uploads/images/' . $item->image;

        $item->image = $default_image;


        $data = array();
        $data['pageTitle'] = 'Cms Bibliography Banner';
        $data['activePageName'] = 'banner';
        $data['activeSubMenu'] = 'cms_bibliography_banner';

        $data['item'] = $item;

        return view("admin.cms_bibliography_banner_edit", ["data" => $data]);
    }


    public function post_update(Request $request)
    {

        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,webp',
        ]);

        $old_image_name = CmsBanner::find($request->id)->image;

        if ($request->image) {

            $imageName = image_convert_webp($request->image,85);

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

        CmsBanner::where("id", $request->id)->update([
            'image' => $imageName,
            'status' => $request->status,
        ]);

        return redirect()->back()->with("success", "Update Successful");
    }


    public function delete(Request $request)
    {

        $item = CmsBanner::find($request->id);

        // dd($request->id);

        $image_path = public_path('uploads/images/' . $item->image);
        $resize_image_path = public_path('uploads/images/resize' . $item->image);

        if (file_exists($image_path)) {
            unlink($image_path);
        }

        if (file_exists($resize_image_path)) {
            unlink($resize_image_path);
        }



        CmsBanner::where('id', $request->id)->delete();

        // return redirect()->route('cms_banner_list')->with("success", "delete done");
        return response()->json(['status' => true, 'msg' => 'delete done']);
    }

}
