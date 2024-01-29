<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use IlLuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            return redirect('/admin/products/');
        }else{
            return redirect('/');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
