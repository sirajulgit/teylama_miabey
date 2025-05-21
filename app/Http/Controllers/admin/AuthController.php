<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\OtpEmail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('admin.auth.login');
    }


    public function post_login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        $login = $request->input('email');
        $user = User::where('email', $login)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Invalid login credentials.');
        }


        if (Auth::attempt(['email' => $user->email, 'password' => $request->password, 'user_type' => 1])) {
            Auth::loginUsingId($user->id);

            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid login credentials.');
        }
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();

        // return redirect()->route('login');
        return json_encode(array('status' => true, 'msg' => 'logout successfully'));
    }




    public function forget_password_page()
    {
        session(['forget_email_verify_status' => false]);

        return view("admin.auth.forget_password");
    }


    public function post_forget_password_page(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $userData = User::where("id", "1")->where("user_type", '1')->where("email", $request->email)->get()->toArray();

        if (count($userData) > 0) {

            $six_digit_random_number = random_int(100000, 999999);


            // Get the current timestamp
            $currentTimestamp = Carbon::now();

            // Add 2 minutes to the current timestamp
            $newTimestamp = $currentTimestamp->addMinutes(2);

            // Convert the new timestamp to Unix timestamp
            $unixTimestamp = $newTimestamp->timestamp;

            User::where("id", "1")->where("user_type", '1')->update([
                'otp' => $six_digit_random_number,
                'otp_time' => $unixTimestamp
            ]);

            $userData = User::where("id", "1")->where("user_type", '1')->get()->toArray();

            // dd($userData[0]['email']);

            $to_email =  $userData[0]['email'];

            Mail::to($to_email)->send(new OtpEmail([
                'otp' => $six_digit_random_number,
            ]));


            session(['forget_email_verify_status' => true]);

            return redirect()->route("otp")->with("success","OTP has been sent to your Admin email");

        } else {
            return redirect()->back()->with("error", "Invalid Email!!");
        }
    }




    public function otp_page()
    {

        if (session()->has('forget_email_verify_status')) {
            if (session()->get("forget_email_verify_status")) {

                session(['otp_verify_status' => false]);

                return view("admin.auth.otp");
            } else {
                return redirect()->route("login");
            }
        } else {
            return redirect()->route("login");
        }
    }

    public function otp_send()
    {
        $six_digit_random_number = random_int(100000, 999999);


        // Get the current timestamp
        $currentTimestamp = Carbon::now();

        // Add 2 minutes to the current timestamp
        $newTimestamp = $currentTimestamp->addMinutes(2);

        // Convert the new timestamp to Unix timestamp
        $unixTimestamp = $newTimestamp->timestamp;

        User::where("id", "1")->where("user_type", '1')->update([
            'otp' => $six_digit_random_number,
            'otp_time' => $unixTimestamp
        ]);

        $userData = User::where("id", "1")->where("user_type", '1')->get()->toArray();

        // dd($userData[0]['email']);

        $to_email =  $userData[0]['email'];

        Mail::to($to_email)->send(new OtpEmail([
            'otp' => $six_digit_random_number,
        ]));

        return response()->json([
            "status" => true,
            "msg" => "OTP Send Your Register Email"
        ]);
    }


    public function otp_verify(Request $request)
    {

        $userData = User::where("otp", $request->otp)->get()->toArray();

        if (count($userData) > 0) {
            session(['otp_verify_status' => true]);

            return response()->json([
                "status" => true,
                "msg" => "OTP ok"
            ]);
        } else {
            return response()->json([
                "status" => false,
                "msg" => "Wrong OTP Enter!!"
            ]);
        }
    }



    public function confirmPassword_page()
    {
        if (session()->has('otp_verify_status')) {
            if (session()->get("otp_verify_status")) {
                return view("admin.auth.confirmPassword");
            } else {
                return redirect()->route("login");
            }
        } else {
            return redirect()->route("login");
        }
    }


    public function post_confirmPassword_page(Request $request)
    {

        $request->validate([
            'password' => 'min:8|required|same:password_confirm',
            'password_confirm' => 'min:8|required',
        ]);

        User::where("id", "1")->where("user_type", '1')->update([
            'password' => Hash::make($request->password),
            'otp' => null,
            'otp_time' => null,
        ]);

        session()->forget('otp_verify_status');
        session()->forget('forget_email_verify_status');

        return redirect()->route("login")->with("success", "Password has been changed successfully");
    }
}
