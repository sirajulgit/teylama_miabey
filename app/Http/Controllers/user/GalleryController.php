<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\CmsBanner;
use App\Models\Gallery;
use Illuminate\Http\Request;


class GalleryController extends Controller
{
    //

    public function index()
    {
        $data = [
            'page_title' => 'Gallery',
            'activePageName' => 'gallery',
            'banner_data' => [],
            'gallery_data' => [],
        ];


        // +++++++++++++++ | GALLERY | +++++++++++++++
        $items = Gallery::orderBy("id", "desc")->paginate(6);

        $items->getCollection()->transform(function ($item) {
            if (!is_null($item->image)) {
                $default_image = '/uploads/images/' . $item->image;
                $item->image = $default_image;
            }
            return $item;
        });

        $data['gallery_data'] = $items;



        // +++++++++++++++ | CMS BANNER | +++++++++++++++
        $cmsBanner = CmsBanner::where('type', 'awardHonors_page')->orderBy("id", "asc")->get()->toArray();

        foreach ($cmsBanner as $item) {

            if (!is_null($item['image'])) {
                $default_image = '/uploads/images/' . $item['image'];
                $item['image'] = $default_image;
            }

            array_push($data['banner_data'], $item);
        }


        return view('user.gallery', ['data' => $data]);
    }

}
