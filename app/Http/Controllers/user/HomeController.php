<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CmsBanner;
use App\Models\CmsHomePage;
use App\Models\CmsBadge;
use App\Models\Gallery;
use App\Models\Blog;

class HomeController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'Home',
            'activePageName' => 'home',
        ];

        $items = CmsBanner::where('type', 'home_page')->orderBy("id", "asc")->get();

        $temp_arr = [];
        foreach ($items as $item) {

            $default_image = '/uploads/images/' . $item['image'];

            $item->image = $default_image;

            array_push($temp_arr, $item);
        }
        $cmsHome = CmsHomePage::where('page_type', 'home_page')->orderBy("id", "asc")->get()->toArray();

        $items = [];

        foreach ($cmsHome as $item) {

            if (!is_null($item['image_1'])) {
                $default_image = '/uploads/images/' . $item['image_1'];
                $item['image_1'] = $default_image;
            }

            if (!is_null($item['image_2'])) {
                $default_image = '/uploads/images/' . $item['image_2'];
                $item['image_2'] = $default_image;
            }

            if (!is_null($item['image_3'])) {
                $default_image = '/uploads/images/' . $item['image_3'];
                $item['image_3'] = $default_image;
            }

            if (!is_null($item['image_4'])) {
                $default_image = '/uploads/images/' . $item['image_4'];
                $item['image_4'] = $default_image;
            }

            if (!is_null($item['about_badge_icon1'])) {
                $default_image = '/uploads/images/' . $item['about_badge_icon1'];
                $item['about_badge_icon1'] = $default_image;
            }

            if (!is_null($item['about_badge_icon2'])) {
                $default_image = '/uploads/images/' . $item['about_badge_icon2'];
                $item['about_badge_icon2'] = $default_image;
            }

            if (!is_null($item['about_badge_icon3'])) {
                $default_image = '/uploads/images/' . $item['about_badge_icon3'];
                $item['about_badge_icon3'] = $default_image;
            }

            if (!is_null($item['about_badge_icon4'])) {
                $default_image = '/uploads/images/' . $item['about_badge_icon4'];
                $item['about_badge_icon4'] = $default_image;
            }
              if (!is_null($item['about_profile_image'])) {
                $default_image = '/uploads/images/' . $item['about_profile_image'];
                $item['about_profile_image'] = $default_image;
            }

            if (!is_null($item['about_signature_image'])) {
                $default_image = '/uploads/images/' . $item['about_signature_image'];
                $item['about_signature_image'] = $default_image;
            }


            if (!is_null($item['file_1'])) {
                $default_file = '/uploads/files/' . $item['file_1'];
                $item['file_1'] = $default_file;
            }



            if ($item['type'] == "about") {
                $items["about"] = $item;
            } elseif ($item['type'] == "what_we_do") {
                $items["what_we_do"] = $item;

                $cmsBadge = CmsBadge::where('type', 'what_we_do')->orderBy("id", "asc")->get()->toArray();

                $items['what_we_do']["badge_data"] = [];

                foreach ($cmsBadge as $item2) {

                    if (!is_null($item2['badge_file_1'])) {
                        $default_file = '/uploads/files/' . $item2['badge_file_1'];
                        $item2['badge_file_1'] = $default_file;
                    }

                    if (!is_null($item2['badge_file_2'])) {
                        $default_file = '/uploads/files/' . $item2['badge_file_2'];
                        $item2['badge_file_2'] = $default_file;
                    }


                    if (!is_null($item2['badge_icon_1'])) {
                        $default_file = '/uploads/images/' . $item2['badge_icon_1'];
                        $item2['badge_icon_1'] = $default_file;
                    }


                    if (!is_null($item2['badge_image_1'])) {
                        $default_file = '/uploads/images/' . $item2['badge_image_1'];
                        $item2['badge_image_1'] = $default_file;
                    }

                    $items['what_we_do']["badge_data"][] = $item2;
                }
            } elseif ($item['type'] == "video_section") {
                $items["video_section"] = $item;
            } elseif ($item['type'] == "info_section") {
                $items["info_section"] = $item;
            }
        }
        //dd($items);exit;

        $gallery = Gallery::orderBy("id", "desc")->limit(8)->get();

        $gallery_arr = [];
        foreach ($gallery as $item) {

            $default_image = '/uploads/images/' . $item['image'];

            $item->image = $default_image;

            array_push($gallery_arr, $item);
        }


        $blog = Blog::orderBy("id", "desc")->get();

        $blog_arr = [];
        foreach ($blog as $item) {

            $default_image = '/uploads/images/' . $item['image'];

            $item->image = $default_image;

            array_push($blog_arr, $item);
        }









        return view('user.home', ['bannerdata' => $temp_arr, 'data' => $data, 'homedata' => $items, 'gallerydata' => $gallery_arr, 'blogdata' => $blog_arr]);
    }
}
