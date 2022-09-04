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
        $u = User::where('codusr', $request->input('codusr'))->first();
        if ($u == null) {
            return 0;
        }
        $credenciales = request()->only('codusr', 'password', 'aeropuerto');
        if ($u['aeropuerto'] == 'T') {
            $credenciales = request()->only('codusr', 'password');
        }
        if (Auth::attempt($credenciales)) {
            session(['aero' => $request->input('aeropuerto')]);
            return 'success';
        } else {
            return '1';
        }
        return 'fail';
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
