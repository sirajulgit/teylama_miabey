<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    //
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function login(Request $request)
    {
        $data = [
            'page_title' => 'Login',
        ];

        return view('user.auth.login', ['data' => $data]);
    }

    public function post_login(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $userData = $this->userModel->where('username', $request->username)->first();

        if (!$userData) {
            return redirect()->back()->with('error', 'Invalid login credentials.');
        }

        if (Auth::attempt(['username' => $userData->username, 'password' => $request->password, 'user_type' => 2])) {
            Auth::loginUsingId($userData->id);

           return redirect()->route('user_dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid login credentials.');
        }
    }


    public function register(Request $request)
    {
        $data = [
            'page_title' => 'Register',
        ];

        return view('user.auth.register', ['data' => $data]);
    }

    public function post_register(Request $request)
    {

        $request->validate([
            'invitation_code' => 'nullable|string|size:8',
            'username' => 'required|unique:users,username',
            'phn_no' => 'nullable|string|size:10',
            'password' => 'required|string|min:6',
        ]);

        // dd($request->all());

        $this->userModel->create([
            'user_type' => 2,
            'invitation_code' => $request->invitation_code,
            'username' => $request->username,
            'phn_no' => $request->phn_no,
            'password' => $request->password,
        ]);

        return redirect()->route('user_login')->with('success', 'User Registered Successfully');
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();

        // return redirect()->route('login');
        return json_encode(array('status' => true, 'msg' => 'logout successfully'));
    }
}
