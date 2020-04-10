<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('adminLogout');
    }

    public function showLoginForm()
    {
        return view('auth.admin.login');

    }

    public function login(Request $request)
    {
        //validate the form data
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required|min:6'
        // ]);

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ],[
            'email.required'    => 'OOPS .. please Enter your email',
            'password.required' => 'OOPS .. please Enter your password'
        ]);

        //attempt to log the user in
        $credentials = [
            'email' => $request->email,
            'password'  => $request->password
        ];

        if( Auth::guard('admin')->attempt($credentials, $request->remember) )
        {
            //if successful , then redirect to thier intended location
            return redirect()->intended(route('admin.index'));

        }

        //if unsuccessful , then redirect back to login form
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }


    public function adminLogout()
    {
        Auth::guard('admin')->logout();

        return redirect('/');
    }


}
