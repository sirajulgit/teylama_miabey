<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\CmsBanner;
use App\Models\CmsContact;
use App\Models\ContactQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsEmail;
use Exception;
use Illuminate\Support\Facades\Log;

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
        $cmsBanner = CmsBanner::where('type', 'bibliography_page')->orderBy("id", "asc")->get()->toArray();

        foreach ($cmsBanner as $item) {

            if (!is_null($item['image'])) {
                $default_image = '/uploads/images/' . $item['image'];
                $item['image'] = $default_image;
            }

            array_push($data['banner_data'], $item);
        }


        return view('user.contact_us', ['data' => $data]);
    }


    public function post_contact_us(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $data = new ContactQuery();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->message = $request->message;
        $data->save();


        try {

            // dd(env('ADMIN_MAIL'));

            /////////// user email send /////////////////////
            Mail::to($request->email)->send(new ContactUsEmail([
                'mailData' => [
                    'message' => "Thank you for contacting us. We will get back to you soon.",
                ]
            ]));


            /////////// admin email send /////////////////////
            Mail::to(env('ADMIN_MAIL'))->send(new ContactUsEmail([
                'subject' => "New Contact Query",
                'mailData' => [
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'message' => $request->message,
                ],
            ]));
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
        }

        // Return success response
        return response()->json([
            'status' => true,
            'msg' => 'Thank you for contacting us.',
        ], 200);
    }
}
