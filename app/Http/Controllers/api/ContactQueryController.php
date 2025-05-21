<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Mail\AdminInformEmail;
use App\Mail\FeedbackEmail;
use App\Models\ContactQuery;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;


class ContactQueryController extends Controller
{
    //

    public function contact_submit(Request $request)
    {

        try {

            ///////////// Validated ///////////////////
            $validateData = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    // 'phone' => 'required',
                    'email' => 'required|email',
                    'message' => 'required',
                ]
            );

            if ($validateData->fails()) {
                return response()->json([
                    'status' => false,
                    'msg' => 'validation error',
                    'errors' => $validateData->errors()
                ], 401);
            }
            ///////////// End Validated ///////////////////


            /////////// user email send /////////////////////
            Mail::to($request->email)->send(new FeedbackEmail([
                'message' => "Thank you submit your query.",
            ]));



            /////////// admin email send /////////////////////
            $userData = User::where("id", "1")->where("user_type", '1')->get()->toArray();
            $to_email =  $userData[0]['email'];
            Mail::to($to_email)->send(new AdminInformEmail([
                'name' => $request->name,
                // 'phone' => $request->phone,
                'email' => $request->email,
                'message' => $request->message,
            ]));


            $data = new ContactQuery();
            $data->name = $request->name;
            // $data->phone = $request->phone;
            $data->email = $request->email;
            $data->message = $request->message;
            $data->save();

            return response()->json([
                "status" => true,
                "msg" => "Query from submit successfully"
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
