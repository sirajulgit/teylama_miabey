<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CmsBadge;
use App\Models\CmsBanner;
use Illuminate\Support\Str;
use Exception;
use App\Models\CmsHomePage;
use Illuminate\Http\Request;

class CmsHomePageController extends Controller
{
    //

    // home page
    public function home_page()
    {
        $data = array();
        $data['pageTitle'] = 'Cms Home';
        $data['activePageName'] = 'cms';
        $data['activeSubMenu'] = 'cms_home_page';


        $cmsHome = CmsHomePage::where('page_type','home_page')->orderBy("id", "asc")->get()->toArray();

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




       // dd($items);



        return view("admin.cms_home", ["data" => $data, "items" => $items]);
    }

    public function post_update(Request $request)
    {

        try {


            $formData = $request->all();
            // dd($formData);
            $newFormData = [];
            $table_id = "";

            ////// cms home modal insert //////////////
            foreach ($formData as $key => $val) {

                $not_allow_keys = ["_token", "badge_text_1", "badge_text_2", "badge_file_1", "badge_file_2", "badge_icon_1", "badge_image_1", "badge_title_1", "badge_details_1", "old_badge_text_1", "old_badge_text_2", "old_badge_file_1", "old_badge_file_2", "old_badge_icon_1", "old_badge_image_1", "old_badge_title_1", "old_badge_details_1", "badge_id"];

                if (in_array($key, $not_allow_keys)) {
                    continue;
                } elseif ($key == "id") {
                    $table_id = $val;
                } elseif ($key == "image_1") {

                    $old_image_name = CmsHomePage::find($request->id)->image_1;

                    if ($request->image_1) {

                        if (is_null($old_image_name)) {

                            $imageName = image_convert_webp($request->image_1);
                        } else {

                            $imageName = image_convert_webp($request->image_1);

                            $image_path = public_path('uploads/images/' . $old_image_name);
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }

                        $newFormData[$key] = $imageName;
                    }
                } elseif ($key == "image_2") {

                    $old_image_name = CmsHomePage::find($request->id)->image_2;

                    if ($request->image_2) {

                        if (is_null($old_image_name)) {

                            $imageName = image_convert_webp($request->image_2);
                        } else {

                            $imageName = image_convert_webp($request->image_2);

                            $image_path = public_path('uploads/images/' . $old_image_name);
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }

                        $newFormData[$key] = $imageName;
                    }
                } elseif ($key == "image_3") {

                    $old_image_name = CmsHomePage::find($request->id)->image_3;

                    if ($request->image_3) {

                        if (is_null($old_image_name)) {

                            $imageName = image_convert_webp($request->image_3);
                        } else {

                            $imageName = image_convert_webp($request->image_3);

                            $image_path = public_path('uploads/images/' . $old_image_name);
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }

                        $newFormData[$key] = $imageName;
                    }
                } elseif ($key == "image_4") {

                    $old_image_name = CmsHomePage::find($request->id)->image_4;

                    if ($request->image_4) {

                        if (is_null($old_image_name)) {

                            $imageName = image_convert_webp($request->image_4);
                        } else {

                            $imageName = image_convert_webp($request->image_4);

                            $image_path = public_path('uploads/images/' . $old_image_name);
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }

                        $newFormData[$key] = $imageName;
                    }

                 } elseif ($key == "about_badge_icon1") {

                    $old_image_name = CmsHomePage::find($request->id)->about_badge_icon1;

                    if ($request->about_badge_icon1) {

                        if (is_null($old_image_name)) {

                            $imageName = image_convert_webp($request->about_badge_icon1);
                        } else {

                            $imageName = image_convert_webp($request->about_badge_icon1);

                            $image_path = public_path('uploads/images/' . $old_image_name);
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }

                        $newFormData[$key] = $imageName;
                    }
                 } elseif ($key == "about_badge_icon2") {

                    $old_image_name = CmsHomePage::find($request->id)->about_badge_icon2;

                    if ($request->about_badge_icon2) {

                        if (is_null($old_image_name)) {

                            $imageName = image_convert_webp($request->about_badge_icon2);
                        } else {

                            $imageName = image_convert_webp($request->about_badge_icon2);

                            $image_path = public_path('uploads/images/' . $old_image_name);
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }

                        $newFormData[$key] = $imageName;
                    }
                } elseif ($key == "about_badge_icon3") {

                    $old_image_name = CmsHomePage::find($request->id)->about_badge_icon3;

                    if ($request->about_badge_icon3) {

                        if (is_null($old_image_name)) {

                            $imageName = image_convert_webp($request->about_badge_icon3);
                        } else {

                            $imageName = image_convert_webp($request->about_badge_icon3);

                            $image_path = public_path('uploads/images/' . $old_image_name);
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }

                        $newFormData[$key] = $imageName;
                    }
                } elseif ($key == "about_badge_icon4") {

                    $old_image_name = CmsHomePage::find($request->id)->about_badge_icon4;

                    if ($request->about_badge_icon4) {

                        if (is_null($old_image_name)) {

                            $imageName = image_convert_webp($request->about_badge_icon4);
                        } else {

                            $imageName = image_convert_webp($request->about_badge_icon4);

                            $image_path = public_path('uploads/images/' . $old_image_name);
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }

                        $newFormData[$key] = $imageName;
                    }

                } elseif ($key == "about_profile_image") {

                    $old_image_name = CmsHomePage::find($request->id)->about_profile_image;

                    if ($request->about_profile_image) {

                        if (is_null($old_image_name)) {

                            $imageName = image_convert_webp($request->about_profile_image);
                        } else {

                            $imageName = image_convert_webp($request->about_profile_image);

                            $image_path = public_path('uploads/images/' . $old_image_name);
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }

                        $newFormData[$key] = $imageName;
                    }
                } elseif ($key == "about_signature_image") {

                    $old_image_name = CmsHomePage::find($request->id)->about_signature_image;

                    if ($request->about_signature_image) {

                        if (is_null($old_image_name)) {

                            $imageName = image_convert_webp($request->about_signature_image);
                        } else {

                            $imageName = image_convert_webp($request->about_signature_image);

                            $image_path = public_path('uploads/images/' . $old_image_name);
                            if (file_exists($image_path)) {
                                unlink($image_path);
                            }
                        }

                        $newFormData[$key] = $imageName;
                    }





                } elseif ($key == "file_1") {

                    $old_file_name = CmsHomePage::find($request->id)->file_1;

                    if ($request->file_1) {

                        if (is_null($old_file_name)) {

                            $random = Str::random(12);

                            $fileName = $random . '-' . time() . '.' . $request->file_1->extension();

                            $request->file_1->move(public_path('uploads/files'), $fileName);
                        } else {

                            $random = Str::random(12);

                            $fileName = $random . '-' . time() . '.' . $request->file_1->extension();

                            $request->file_1->move(public_path('uploads/files'), $fileName);

                            $file_path = public_path('uploads/files/' . $old_file_name);
                            if (file_exists($file_path)) {
                                unlink($file_path);
                            }
                        }

                        $newFormData[$key] = $fileName;
                    }
                } else {
                    $newFormData[$key] = $val;
                }
            }

            // dd($newFormData);
            // dd($table_id);

            CmsHomePage::where('page_type','home_page')->where("id", $table_id)->update($newFormData);



            ////// cms badge modal insert (what_we_do) //////////////
            if (array_key_exists("badge_text_1", $formData)) {

                for ($item = 0; $item < count($formData['badge_text_1']); $item++) {


                    $data = new CmsBadge();
                    $data->page_type= 'home_page';
                    $data->type = 'what_we_do';

                    // bade_text_1 (category name)
                    if (array_key_exists("badge_text_1", $formData)) {
                        if ($formData['badge_text_1'][$item]) {
                            $data->badge_text_1 = $formData['badge_text_1'][$item];
                        }
                    }


                    // badge_icon_1 (category icon)
                    if (array_key_exists("badge_icon_1", $formData)) {
                        if ($formData['badge_icon_1'][$item]) {
                            $random = Str::random(12);
                            $fileName = $random . '-' . time() . '.' . $formData['badge_icon_1'][$item]->extension();
                            $formData['badge_icon_1'][$item]->move(public_path('uploads/images'), $fileName);

                            $data->badge_icon_1 = $fileName;
                        }
                    }


                    // badge_title_1 (category title)
                    if (array_key_exists("badge_title_1", $formData)) {
                        if ($formData['badge_title_1'][$item]) {
                            $data->badge_title_1 = $formData['badge_title_1'][$item];
                        }
                    }


                    // badge_details_1 (category details)
                    if (array_key_exists("badge_details_1", $formData)) {
                        if ($formData['badge_details_1'][$item]) {
                            $data->badge_details_1 = $formData['badge_details_1'][$item];
                        }
                    }


                    // badge_image_1(category image)
                    if (array_key_exists("badge_image_1", $formData)) {
                        if ($formData['badge_image_1'][$item]) {
                            $random = Str::random(12);
                            $fileName = $random . '-' . time() . '.' . $formData['badge_image_1'][$item]->extension();
                            $formData['badge_image_1'][$item]->move(public_path('uploads/images'), $fileName);

                            $data->badge_image_1 = $fileName;
                        }
                    }


                    $data->save();
                }
            }


            // return json_encode(array(
            //     'status' => true,
            //     'msg' => 'Update Successfully',
            //     'data' => $newFormData,
            //     'table_id' => $table_id,
            // ));

            return redirect()->back()->with("success", "Update successfully");

        } catch (Exception $e) {
            // echo $e->getMessage();
            dd($e);
            return response()->json(['status' => false, 'error_msg' => $e->getMessage()]);
        }
    }



    public function post_badge_delete(Request $request)
    {
        try {

            $badgeId = $request->input('id');

            $item = CmsBadge::find($badgeId);


            if (!is_null($item->badge_file_1)) {
                $file_path = public_path('uploads/files/' . $item->badge_file_1);

                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            if (!is_null($item->badge_file_2)) {
                $file_path = public_path('uploads/files/' . $item->badge_file_2);

                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            if (!is_null($item->badge_icon_1)) {
                $file_path = public_path('uploads/images/' . $item->badge_icon_1);

                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            if (!is_null($item->badge_image_1)) {
                $file_path = public_path('uploads/images/' . $item->badge_image_1);

                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }


            CmsBadge::where('id', $badgeId)->delete();

            return response()->json([
                "status" => true,
                "msg" => "delete successfully"
            ], 200);
        } catch (Exception $ex) {

            return response()->json([
                "status" => false,
                "error" => $ex
            ], 201);
        }
    }


    public function post_badge_update(Request $request)
    {
        try {

            $data = [];

            if ($request->badge_text_1) {
                $data['badge_text_1'] = $request->badge_text_1;
            }

            if ($request->badge_text_2) {
                $data['badge_text_2'] = $request->badge_text_2;
            }

            if ($request->badge_title_1) {
                $data['badge_title_1'] = $request->badge_title_1;
            }

            if ($request->badge_details_1) {
                $data['badge_details_1'] = $request->badge_details_1;
            }

            if ($request->badge_icon_1) {
                $random = Str::random(12);
                $fileName = $random . '-' . time() . '.' . $request->badge_icon_1->extension();
                $request->badge_icon_1->move(public_path('uploads/images'), $fileName);
                $data['badge_icon_1'] = $fileName;

                $old_file_name = CmsBadge::find($request->badge_id)->badge_icon_1;

                if (!is_null($old_file_name)) {
                    $file_path = public_path('uploads/images/' . $old_file_name);
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
            }


            if ($request->badge_image_1) {
                $random = Str::random(12);
                $fileName = $random . '-' . time() . '.' . $request->badge_image_1->extension();
                $request->badge_image_1->move(public_path('uploads/images'), $fileName);
                $data['badge_image_1'] = $fileName;

                $old_file_name = CmsBadge::find($request->badge_id)->badge_image_1;

                if (!is_null($old_file_name)) {
                    $file_path = public_path('uploads/images/' . $old_file_name);
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
            }

            if ($request->badge_file_1) {
                $random = Str::random(12);
                $fileName = $random . '-' . time() . '.' . $request->badge_file_1->extension();
                $request->badge_file_1->move(public_path('uploads/files'), $fileName);
                $data['badge_file_1'] = $fileName;

                $old_file_name = CmsBadge::find($request->badge_id)->badge_file_1;

                if (!is_null($old_file_name)) {
                    $file_path = public_path('uploads/files/' . $old_file_name);
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
            }

            if ($request->badge_file_2) {
                $random = Str::random(12);
                $fileName = $random . '-' . time() . '.' . $request->badge_file_2->extension();
                $request->badge_file_2->move(public_path('uploads/files'), $fileName);
                $data['badge_file_2'] = $fileName;

                $old_file_name = CmsBadge::find($request->badge_id)->badge_file_2;

                if (!is_null($old_file_name)) {
                    $file_path = public_path('uploads/files/' . $old_file_name);
                    if (file_exists($file_path)) {
                        unlink($file_path);
                    }
                }
            }

            if (!empty($data)) {
                CmsBadge::where("id", $request->badge_id)->update($data);
            }

            return response()->json([
                "status" => true,
                "msg" => "update successfully",
            ], 200);
        } catch (Exception $ex) {

            dd($ex);

            return response()->json([
                "status" => false,
                "error" => $ex
            ], 201);
        }
    }


    public function post_about_right_img_delete(Request $request)
    {
        try {

            $id = $request->input('id');

            $item = CmsHomePage::find($id);


            if (!is_null($item->image_2)) {
                $file_path = public_path('uploads/images/' . $item->image_2);

                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            CmsHomePage::where('id', $id)->update([
                "image_2" => null
            ]);

            return response()->json([
                "status" => true,
                "msg" => "delete successfully"
            ], 200);
        } catch (Exception $ex) {

            return response()->json([
                "status" => false,
                "error" => $ex->getMessage()
            ], 201);
        }
    }


    public function post_del_badge_img(Request $request)
    {

        try {

            $id = $request->input('id');
            $field_name = $request->input('field_name');

            $item = CmsHomePage::find($id);


            if (!is_null($item[$field_name])) {
                $file_path = public_path('uploads/images/' . $item[$field_name]);

                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            CmsHomePage::where('id', $id)->update([
                $field_name => null
            ]);

            return response()->json([
                "status" => true,
                "msg" => "delete successfully"
            ], 200);
        } catch (Exception $ex) {

            return response()->json([
                "status" => false,
                "error" => $ex->getMessage()
            ], 201);
        }
    }
}
