<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect("/biodata");
        }else{
            return view("auth.login");
        }
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect(RouteServiceProvider::HOME);
        }else{
            return redirect('/login')->with('failed', 'login failed expected wrong email or password');
        }
    }
}
