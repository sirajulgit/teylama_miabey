<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\CmsBanner;
use App\Models\CmsContact;
use Illuminate\Http\Request;


class ContactUsController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'Contact Us',
            'activePageName' => 'contact_us',
            'contact_data' => [],
            'banner_data' => [],
        ];

        // +++++++++++++++ | CONTACT Data | +++++++++++++++
        $data['contact_data'] = CmsContact::first();


        // +++++++++++++++ | CMS BANNER | +++++++++++++++
        $cmsBanner = CmsBanner::where('type', 'contact_page')->orderBy("id", "asc")->get()->toArray();

        foreach ($cmsBanner as $item) {

            if (!is_null($item['image'])) {
                $default_image = '/uploads/images/' . $item['image'];
                $item['image'] = $default_image;
            }

            array_push($data['banner_data'], $item);
        }


        return view('user.contact_us', ['data' => $data]);
    }

}
