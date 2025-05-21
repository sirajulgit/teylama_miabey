<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Exception;


class EventController extends Controller
{
    //

    public function index(Request $request)
    {

        try {

            $perPage = $request->input('perPage', 10);

            if ($perPage == "all") {

                $items = Event::where('status', '1')->orderBy("id", "desc")->get();
                
                foreach($items as $item){
                    $item->image = env("APP_URL") . '/uploads/images/' . $item->image;
                }

            } else {

                $items = Event::where('status', '1')->orderBy("id", "desc")->paginate($perPage);

                $items->getCollection()->transform(function ($item) {
                    $item->image = env("APP_URL") . '/uploads/images/' . $item->image;
                    return $item;
                });
            }


            return response()->json([
                "status" => true,
                "data" => $items
            ], 200);
        } catch (Exception $ex) {

            return response()->json([
                "status" => false,
                "error" => $ex
            ], 201);
        }
    }


    public function singleRecord($id, Request $request)
    {

        try {


            $item = Event::find($id);
            $default_image = env("APP_URL") . '/uploads/images/' . $item->image;
            $item->image = $default_image;


            return response()->json([
                "status" => true,
                "data" => $item
            ], 200);
        } catch (Exception $ex) {

            return response()->json([
                "status" => false,
                "error" => $ex
            ], 201);
        }
    }
}
