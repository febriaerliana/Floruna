<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'showLoginForm']);
    }

    public function showLoginForm(Request $request)
    {
        if (Auth::user()) {
            return redirect()->route('dashboard.admin.flora.index');
        }
        return view('modules.login');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $user = User::where('email', $username)->get()->first();

        if (is_null($user)) {
            return redirect()
                ->back()
                ->with('failed', 'We can\'t find your account')
                ->withInput();
        }
        if (Auth::attempt(['email' => $username, 'password' => $password])) {
            return redirect()->route('dashboard.admin.flora.index');
//            return redirect()->route('dashboard.kasir.produk.index');
        } else {
            return redirect()
                ->back()
                ->with('failed', 'Your password is incorrect')
                ->withInput();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
