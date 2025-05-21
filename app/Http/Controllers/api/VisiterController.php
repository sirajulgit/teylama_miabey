<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Visiter;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class VisiterController extends Controller
{
    //

    public function visiter_submit(Request $request)
    {

        try {

            ///////////// Validated ///////////////////
            $validateData = Validator::make(
                $request->all(),
                [
                    'client_ip' => 'required|ipv4',
                ]
            );

            if ($validateData->fails()) {
                return response()->json([
                    'status' => false,
                    'msg' => 'validation error',
                    'errors' => $validateData->errors()
                ], 202);
            }
            ///////////// End Validated ///////////////////

            $data = Visiter::where("ip", $request->client_ip)->get()->toArray();

            if (count($data) > 0) {
                return response()->json([
                    "status" => true,
                    "msg" => "Already visit"
                ], 200);
            } else {
                $data = new Visiter();
                $data->ip = $request->client_ip;
                $data->save();
            }


            return response()->json([
                "status" => true,
                "msg" => "New visiter insert"
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
