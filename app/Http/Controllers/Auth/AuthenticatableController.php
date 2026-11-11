<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatableController extends Controller
{
    public function login()
    {
        return view("Auth.login");
    }

    public function login_store(Request $request)
    {
        $validate  = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (!Auth::attempt($validate)) {
            return redirect()->route("login")->with('error', 'Incorrect email or password');
        }

        $request->session()->regenerate();
        return redirect()->route("dashboard")->with("success", "Successfuly logged in");
    }

    public function logout(Request $request)
    {
        Auth::guard("web")->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route("login");
    }
}
