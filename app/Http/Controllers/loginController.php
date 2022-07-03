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
        $credenciales = request()->only('usu_ci', 'password');
        $u = User::where('usu_ci', $request->input('usu_ci'))->first();
        if ($u == null) {
            return '0';
        } else if (Auth::attempt($credenciales)) {
            return 'success';
        } else {
            return '1';
        }
        if (Auth::attempt($credenciales)) {
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
