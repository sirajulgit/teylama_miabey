<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CmsBadge;
use App\Models\CmsHomePage;
use App\Models\Logo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    //


    public function index()
    {
        $data = array();
        $data['pageTitle'] = 'Setting';
        $data['activePageName'] = 'setting';
        $data['activeSubMenu'] = '';

        $items = [];

        $adminEmail = User::where("id", "1")->where("user_type", '1')->get()->toArray();
        $items['admin_email'] = $adminEmail[0]['email'];


        $headerLogoData = Logo::where("type", "header_logo")->get()->toArray();
        if (!is_null($headerLogoData[0]['image'])) {
            $default_image = '/uploads/images/' .  $headerLogoData[0]['image'];
            $items['header_logo'] = $default_image;
        } else {
            $items['header_logo'] = null;
        }


        $footerLogoData = Logo::where("type", "footer_logo")->get()->toArray();
        if (!is_null($footerLogoData[0]['image'])) {
            $default_image = '/uploads/images/' .  $footerLogoData[0]['image'];
            $items['footer_logo'] = $default_image;
        } else {
            $items['footer_logo'] = null;
        }


        // dd($items);

        return view("admin.setting", ["data" => $data, "items" => $items]);
    }



    public function updateAdminEmail(Request $request)
    {
        User::where("id", "1")->where("user_type", '1')->update([
            'email' => $request->admin_email,
        ]);


        return redirect()->back()->with("success", "Update Successfully");
    }


    public function updateHeaderLogo(Request $request)
    {


        $old_image_name = Logo::where("type", "header_logo")->get()->toArray();

        $old_image_name = $old_image_name[0]['image'];

        if ($request->header_logo) {

            $imageName = Str::random() . '-' . time() . '.' . $request->header_logo->extension();

            $request->header_logo->move(public_path('uploads/images'), $imageName);

            image_resize($imageName, 95, 84);

            if (!is_null($old_image_name)) {
                $image_path = public_path('uploads/images/' . $old_image_name);
                $resize_image_path = public_path('uploads/images/resize' . $old_image_name);

                if (file_exists($image_path)) {
                    unlink($image_path);
                }

                if (file_exists($resize_image_path)) {
                    unlink($resize_image_path);
                }
            }
        } else {

            $imageName = $old_image_name;
        }


        Logo::where("type", "header_logo")->update([
            'image' => $imageName,
        ]);


        return redirect()->back()->with("success", "Update Successfully");
    }



    public function updateFooterLogo(Request $request)
    {


        $old_image_name = Logo::where("type", "footer_logo")->get()->toArray();

        $old_image_name = $old_image_name[0]['image'];

        if ($request->footer_logo) {

            $imageName = Str::random() . '-' . time() . '.' . $request->footer_logo->extension();

            $request->footer_logo->move(public_path('uploads/images'), $imageName);

            image_resize($imageName, 95, 84);

            if (!is_null($old_image_name)) {
                $image_path = public_path('uploads/images/' . $old_image_name);
                $resize_image_path = public_path('uploads/images/resize' . $old_image_name);

                if (file_exists($image_path)) {
                    unlink($image_path);
                }

                if (file_exists($resize_image_path)) {
                    unlink($resize_image_path);
                }
            }
        } else {

            $imageName = $old_image_name;
        }


        Logo::where("type", "footer_logo")->update([
            'image' => $imageName,
        ]);


        return redirect()->back()->with("success", "Update Successfully");
    }
}
