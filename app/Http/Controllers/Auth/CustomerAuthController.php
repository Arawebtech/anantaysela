<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Customer;
use Illuminate\Support\Facades\Log;

class CustomerAuthController extends Controller
{
     // customer login
    public function showRegisterForm()
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('dashboard');
        }
        return view('admin.auth.customerregister');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Customer::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Save data in customer table
        $customer = Customer::create([
            'first_name' => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);

        // Login customer after registration
        Auth::guard('customer')->login($customer);
         session()->regenerate();
        session()->regenerateToken();

        // Debug current auth status
        Log::info('After login - Customer check:', ['customer' => Auth::guard('customer')->check()]);
        Log::info('After login - User check:', ['user' => Auth::guard('web')->check()]);

        return redirect()->route('dashboard')->with('success', 'Account created successfully!');
    }

    public function dashboard()
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('customer.login');
        }
        return view('dashboard');
    }


    public function showLoginForm()
    {
        if (Auth::guard('customer')->check()) {
            return redirect()->route('dashboard'); // ← customer dashboard
        }
        return view('admin.auth.customerlogin');
    }

    public function login(Request $request)
    {
        $cred = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($cred)) {
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Invalid Customer Credentials');
    }

    public function logout(Request $request)
    {
         Auth::logout();
        // Session delete
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'User logout successfully!');
       
    }
}
