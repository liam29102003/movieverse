<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MyLoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function loginProcess(Request $request)
    {
        $userInfo = User::where('email','=',$request->email)->first();
        // dd($userInfo->toArray());
        if(!$userInfo)
        {
            return back()->with(['error'=>'Your email is not registered']);
        }
        else
        {
        if(Hash::check($request->password,$userInfo->password))
        {
            return redirect()->route('login');
        }
        else{
            return back()->with(['error'=>"Fail, incorrect password"]);
        }
    }
    }
}
