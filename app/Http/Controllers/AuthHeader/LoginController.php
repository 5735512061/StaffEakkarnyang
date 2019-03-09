<?php

namespace App\Http\Controllers\AuthHeader;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:header')->except('logout');
    }

    public function showLoginForm()
    {
        return view('authHeader.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
          'header_name' => 'required',
          'password' => 'required|min:6'
        ],[
          'header_name.required' => "กรุณากรอกชื่อผู้ใช้",
          'password.required' => "กรุณากรอกรหัสผ่าน",
          'password.min' => "กรุณากรอกรหัสผ่านอย่างน้อย 6 ตัวอักษร",
        ]);


        $credential = [
          'header_name' => $request->header_name,
          'password' =>$request->password
        ];

       if(Auth::guard('header')->attempt($credential, $request->member)){
         return redirect()->intended(route('header.home'));
       }
       
       return redirect()->back()->withInput($request->only('header_name','remember'));
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('header')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->guest(route( 'header.login' ));
    }
}
