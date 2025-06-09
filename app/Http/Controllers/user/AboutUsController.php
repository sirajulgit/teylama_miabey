<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\CmsBadge;
use App\Models\CmsBanner;
use App\Models\CmsHomePage;
use App\Models\Gallery;
use Illuminate\Http\Request;


class AboutUsController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'About Us',
            'activePageName' => 'about_us',
            'banner_data' => [],
            'page_data' => [],
            'gallery_data' => [],
        ];

        // +++++++++++++++ | CMS BANNER | +++++++++++++++
        $cmsBanner = CmsBanner::where('type', 'book_page')->orderBy("id", "asc")->get()->toArray();


        foreach ($cmsBanner as $item) {

            if (!is_null($item['image'])) {
                $default_image = '/uploads/images/' . $item['image'];
                $item['image'] = $default_image;
            }

            array_push($data['banner_data'], $item);
        }

        // +++++++++++++++ | CMS PAGE | +++++++++++++++
        $items = [];

        $cmsHome = CmsHomePage::where('page_type','about_page')->orderBy("id", "asc")->get()->toArray();

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

            if (!is_null($item['file_1'])) {
                $default_file = '/uploads/files/' . $item['file_1'];
                $item['file_1'] = $default_file;
            }



            if ($item['type'] == "section_1") {
                $items["section_1"] = $item;
            }elseif ($item['type'] == "section_2") {
                $items["section_2"] = $item;
            } elseif ($item['type'] == "activities_section") {
                $items["activities_section"] = $item;
            } elseif ($item['type'] == "politician_section") {
                $items["politician_section"] = $item;

                $cmsBadge = CmsBadge::where('type', 'politician_section')->orderBy("id", "asc")->get()->toArray();

                $items['politician_section']["badge_data"] = [];

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

                    $items['politician_section']["badge_data"][] = $item2;
                }
            }
        }

        $data['page_data'] = $items;


        // +++++++++++++++ | GALLERY | +++++++++++++++
        $galleryData = Gallery::orderBy("id", "desc")->limit(5)->get()->toArray();

        foreach ($galleryData as $item) {

            if (!is_null($item['image'])) {
                $default_image = '/uploads/images/' . $item['image'];
                $item['image'] = $default_image;
            }

            array_push($data['gallery_data'], $item);
        }

        // dd($data);


        return view('user.about_us', ['data' => $data]);
    }
}
