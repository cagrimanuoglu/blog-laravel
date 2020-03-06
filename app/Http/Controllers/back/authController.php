<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use\Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function login()
    {
      return view('back.auth.login');
    }

    public function loginPost(Request $request)
    {
      if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
      {
        return redirect()->route('admin.dashboard');
      }
      return redirect()->route('admin.login')->withErrors('Kullanıcı bilgileri hatalı');
    }

    public function logout()
    {
      Auth::logout();
         return redirect()->route('admin.login');
    }

}
