<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()){
            return redirect()->route('Admin.Dashboard');
        }
        return view('admin::auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            Session::flash('type', 'success');
            Session::flash('message', 'Logado com sucesso!');

            return redirect()->intended('dashboard');
        }

        Session::flash('type', 'error');
        Session::flash('message', 'Verifique suas informações de login.');

        return redirect()->route('Admin.Login');
    }
}
