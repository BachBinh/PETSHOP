<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khachhang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerPost(Request $request){
        $kh = new Khachhang();
        $kh->hoten = $request->name;
        $kh->email = $request->email;
        $kh->password = Hash::make($request->password);
        $kh->diachi = $request->address;
        $kh->sdt = $request->phone;
        $kh->id_phanquyen = 2;
        $kh->save();
        return back()->with('thongbao', 'Đăng ký tài khoản thành công');
    }

    public function loginPost(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/')->with('thongbao', 'Đăng nhập thành công');
        }

        return back()->with('error', 'Sai tên tài khoản hoặc mật khẩu');
    }

    public function logout(){
        Auth::logout();
        return response()->json(['message' => 'Logout successful'], 200);
    }
}
