<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Cms;
use App\Models\CmsBadge;
use App\Models\CmsBanner;
use App\Models\CmsContact;
use App\Models\CmsHomePage;
use App\Models\Logo;
use Illuminate\Http\Request;
use Exception;


class CmsController extends Controller
{
    //

    public function cmsList(Request $request)
    {

        try {

            $tempArr = [];



            ////////////////// Banner Content /////////////////////////////////
            $cms_banner_items = CmsBanner::whereIn('id', function ($query) {
                $query->selectRaw('MIN(id)')
                    ->from('cms_banners')
                    ->where('status', 1)
                    ->groupBy('type');
            })->get();
            foreach ($cms_banner_items as $item) {

                $dataArr = CmsBanner::where('type', $item->type)->where('status', '1')->get();

                foreach ($dataArr as $data) {
                    $data->image = env('APP_URL') . '/uploads/images/' . $data->image;
                    $tempArr['cms_banner'][$data->type][] = $data;
                }
            }
            ////////////////// End Banner Content /////////////////////////////////



            ////////////////// Home Page Content /////////////////////////////////////
            $home_page_contents = CmsHomePage::get();
            foreach ($home_page_contents as $item) {

                if (!is_null($item->image_1)) {
                    $item->image_1 = env('APP_URL') . '/uploads/images/' . $item->image_1;
                }


                if (!is_null($item->image_2)) {
                    $item->image_2 = env('APP_URL') . '/uploads/images/' . $item->image_2;
                }


                if (!is_null($item->image_3)) {
                    $item->image_3 = env('APP_URL') . '/uploads/images/' . $item->image_3;
                }


                if (!is_null($item->image_4)) {
                    $item->image_4 = env('APP_URL') . '/uploads/images/' . $item->image_4;
                }


                if (!is_null($item->file_1)) {
                    $item->file_1 = env('APP_URL') . '/uploads/files/' . $item->file_1;
                }


                $tempArr['home_page_content'][$item->type] = $item;
            }
            ////////////////// End Home Page Content /////////////////////////////////////////



            ///////////////////// Badge (what_i_teach) ///////////////////////////////////////
            $cmsBadge = CmsBadge::where('type', 'what_i_teach')->orderBy("id", "asc")->get()->toArray();

            $badgeArr = [];
            foreach ($cmsBadge as $item2) {

                if (!is_null($item2['badge_file'])) {
                    $default_file = env('APP_URL') . '/uploads/files/' . $item2['badge_file'];
                    $item2['badge_file'] = $default_file;
                }

                array_push($badgeArr, $item2);
            }
            $tempArr['home_page_content']["what_i_teach"]["badge_data"] = $badgeArr;
            //////////////////// End Badge ////////////////////////////////////



            ////////////////// Social Link and Email /////////////////////////////////////////
            $cms_contents = Cms::get();
            foreach ($cms_contents as $item) {
                $tempArr['social_links_email'][$item->type] = $item;
            }
            ////////////////// End Social Link and Email /////////////////////////////////////


            ////////////////// Site Logo /////////////////////////////////////////
            $logo_contents = Logo::get()->toArray();
            foreach ($logo_contents as $item) {
                if (!is_null($item['image'])) {
                    $default_image = env('APP_URL') . '/uploads/images/' . $item['image'];
                    $default_image_2 = env('APP_URL') . '/uploads/images/resize/' . $item['image'];

                    $tempArr['setting'][$item['type']] = [
                        "url" => $default_image,
                        "resize_url" => $default_image_2,
                    ];
                }
            }
            ////////////////// End Site Logo /////////////////////////////////////



            ////////////////// contact_page /////////////////////////////////////////
            $cms_contact_contents = CmsContact::find('1');
            $tempArr['contact_page']['phone'] = $cms_contact_contents->phone;
            $tempArr['contact_page']['email'] = $cms_contact_contents->email;
            $tempArr['contact_page']['address'] = $cms_contact_contents->address;
            ////////////////// End contact_page /////////////////////////////////////



            return response()->json([
                "status" => true,
                "data" => $tempArr
            ], 200);
        } catch (Exception $ex) {

            // dd($ex);

            return response()->json([
                "status" => false,
                "error" => $ex->getMessage()
            ], 201);
        }
    }
}
