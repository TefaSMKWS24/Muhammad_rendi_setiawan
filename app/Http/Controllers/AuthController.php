<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function loginkasir(Request $request)
    {
        if (Auth::guard('(kasir)')->attempt([
                                    'nik'   => $request->nis,
                                    'password' => $request->password]))
        {
            dd('berhasil: '.Auth::guard('kasir')->user());
            log:info('login succesfull');
            //return redirect('/user/dashboard');
        }
        else{
            echo "login gagal";
            //return redirect('/user')->with('warning', 'NIS / Password Salah!');
        }
    }

    public function logoutkasir()
    {
        if (Auth::guard('kasir')->check()){
            Auth::guard('kasir')->logout();
            return redirect('/');
        }
    }
}
