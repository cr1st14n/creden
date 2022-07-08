<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        session()->forget('aero');

        $request->session()->get('aero');
        $credenciales = request()->only('codusr', 'password');
        $u = User::where('codusr', $request->input('codusr'))->first();
        if ($u == null) {
            return '0';
        } else if (Auth::attempt($credenciales)) {
            session(['aero' => $request->input('reg')]);

            return 'success';
        } else {
            return '1';
        }
        if (Auth::attempt($credenciales)) {
            session(['aero' => $request->input('reg')]);

            return 'success';
        }
        return 'fail';
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
