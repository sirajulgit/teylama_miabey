<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;



class BlogController extends Controller
{
    //

    public function index(Request $request)
    {

        try {

            $items = Blog::where('status', '1')->orderBy("id", "desc")->limit(7)->get();
            $latestTempArr = [];
            foreach ($items as $key=>$item) {
                $item->image = env('APP_URL') . '/uploads/images/' . $item->image;
                $latestTempArr['item_'.$key+1] = $item;
            }


            $oldTempArr = [];

            // Loop through the last four months
            for ($i = 1; $i <= 4; $i++) {
                // Calculate the date for the previous month
                $date = now()->subMonths($i)->startOfMonth();

                // Fetch a random record for the previous month
                $record = Blog::where(DB::raw('MONTH(created_at)'), $date->month)
                    ->where(DB::raw('YEAR(created_at)'), $date->year)
                    ->inRandomOrder()
                    ->first();

        
                if ($record) {
                    $default_image = env("APP_URL") . '/uploads/images/' . $record->image;
                    $record->image = $default_image;
                    $oldTempArr[] = $record;
                }
            }


            return response()->json([
                "status" => true,
                "latest_data" => $latestTempArr,
                "old_data"=>$oldTempArr
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


            $item = Blog::find($id);
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
