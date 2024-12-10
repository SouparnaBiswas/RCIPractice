<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login()
    {
        return view('frontend.auth.login');
    }

    public function loginCheck(Request $request)
    {
        $request->validate([
            'user_name'    => 'required',
            'password' => 'required|min:8'
        ]);

        // login by user_name or email
        $fieldType = filter_var($request->user_name, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';
        $request->merge([$fieldType => $request->user_name]);
        if (auth()->attempt($request->only($fieldType, 'password'))) {
            
            if (auth()->user()->status == 1 && Auth::user()->hasRole('ADMIN')){
                return redirect()->route('dashboard');
            }else if (auth()->user()->status == 1 && Auth::user()->hasRole('MATERIAL-MANAGER')){
                return redirect()->route('item-codes.index');
            }else if (auth()->user()->status == 1 && Auth::user()->hasRole('ACCOUNTANT')){
                
                return redirect()->route('dashboard');
            } else {
                auth()->logout();
                return redirect()->back()->with('error', 'Your account is not active!');
            }
        } else {
            return redirect()->back()->with('error', 'User name & password was invalid!');
        }

    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

}
