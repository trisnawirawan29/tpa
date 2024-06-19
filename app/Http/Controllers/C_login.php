<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\tb_user;
use Session;

class C_login extends Controller
{
    function index(){
        return view('login');
    }

    function aksi_login(Request $request){
        
        $username = $request->username;
        $password = $request->password;
        $user = tb_user::where('username','=',$username)
                        ->where('password','=',md5($password))
                        ->first();
        if (!empty($user)) {
            Session::put('login',True);
            Session::put('id',$user->id);
            Session::put('kab_id',$user->kab_id);
            Session::put('nama',$user->nama);
            Session::put('role',$user->role);
        }

        return redirect('/');
    }

    public function aksi_logout(){
        Session::flush();
        return redirect('/');
    }
}
