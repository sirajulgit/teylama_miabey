<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cms;
use Illuminate\Http\Request;
use Exception;

class CmsController extends Controller
{
    //

    public function socialLinksContractEmail_List()
    {
        $data = array();
        $data['pageTitle'] = 'Cms Social Links & Contract Email';
        $data['activePageName'] = 'cms_social_link_contract_email';
        $data['activeSubMenu'] = '';


        $cmsHome = Cms::orderBy("id", "asc")->get()->toArray();

        $items = [];

        foreach ($cmsHome as $item) {

            if ($item['type'] == "contact_email") {
                $items["contact_email"] = $item;
            } 
            elseif ($item['type'] == "fb_link") {
                $items["fb_link"] = $item;
            } 
            elseif ($item['type'] == "twitter_link") {
                $items["twitter_link"] = $item;
            } 
            elseif ($item['type'] == "gmail_link") {
                $items["gmail_link"] = $item;
            } 
            elseif ($item['type'] == "insra_link") {
                $items["insra_link"] = $item;
            }
            elseif ($item['type'] == "youtube_link") {
                $items["youtube_link"] = $item;
            }
        }

        // dd($items);



        return view("admin.cms", ["data" => $data, "items" => $items]);
    }

    public function socialLinksContractEmail_update(Request $request)
    {
        try {


            $formData = $request->details;
           
            for($i=0;$i<count($formData);$i++){

                Cms::where("id", $request['id'][$i])->update([
                    'details'=>$formData[$i]
                ]);
            }

           
            return redirect()->back()->with("success", "Update successfully");

        } catch (Exception $e) {

            // echo $e->getMessage();

            return response()->json(['status'=>false,'error_msg'=>$e->getMessage()]);

        }
    }
}
