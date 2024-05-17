<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khachhang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('pages.login');
    }
    public function register(){
        return view('pages.register');
    }
    public function registerPost(Request $request){
        $kh = new Khachhang();
        $kh->hoten = $request->name;
        $kh->email = $request->email;
        $kh->password = Hash::make($request->password);
        $kh->diachi = $request->address;
        $kh->sdt = $request->phone;
        $kh->id_phanquyen = 2;
        $kh->save();
        return back()->with('thongbao', 'Account registration successful');
    }

    public function loginPost(Request $request){
        $credetials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credetials)){
            return redirect('/')->with('thongbao', 'Logged in successfully');
        }

        return back()->with('error', 'Wrong account name or password');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
