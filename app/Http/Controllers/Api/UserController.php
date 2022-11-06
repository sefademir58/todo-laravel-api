<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credntials = $request->validate([
            'username' => 'required',
            'password' =>'required',
        ]);

        if (!Auth::attempt($credntials)) {
           return 'Giriş bilgileri yanlış';
        }

        return $request->user();
    
      /* $user= User::where('username', $request->username)->first();
        
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Geçersiz Kullanıcı adı, Şifre!']);
        } 
        return response()->json(['message' => true]);
        */
    }

    public function logout() {
        return Auth::logout();
    }

    public function register(Request $request)
    {
        $user= new User();
        $user->firstname= $request->firstname;
        $user->lastname= $request->lastname;
        $user->username= $request->username;
        $user->password= Hash::make($request->password);

        $user->save();
        return $user;
    }


    
}
