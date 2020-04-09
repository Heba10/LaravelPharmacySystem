<?php

namespace App\Http\Controllers\Doctor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class DoctorLoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:doctor')->except('doctorLogout');
    }

    public function showLoginForm()
    {
        return view('auth.doctor.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if( Auth::guard('doctor')->attempt($credentials, $request->remember) )
        {
            //if successful , then redirect to thier intended location
            return redirect()->intended(route('doctors.index'));

        }

        //if unsuccessful , then redirect back to login form
        return redirect()->back()->withInput($request->only('email', 'remember'));

    }

    public function doctorLogout()
    {
        Auth::guard('doctor')->logout();

        return redirect('/');
    }
    
}