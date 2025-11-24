<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminLoginController extends Controller
{
    // admin 
    public function showLoginForm()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }


    public function login(Request $request)
    {
        $cred = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($cred)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('admin.login');
    }

}
