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
        return response()->json(['message' => 'Account registration successful'], 201);
    }

    public function loginPost(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            return response()->json(['message' => 'Login is successful'], 200);
        }

        return response()->json(['message' => 'Wrong account or password name'], 401);
    }

    public function logout(){
        Auth::logout();
        return response()->json(['message' => 'Logout successful'], 200);
    }
}
