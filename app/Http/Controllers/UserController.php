<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login(Request $req){
        
        $userdata = User::where(['email'=>$req->email])->first();
        if(!$userdata || !Hash::check($req->password, $userdata->password)){
            $req->session()->flash('status','Wrong Email & Password');
            return view('/login');
        }else{
            $req->session()->put('user',$userdata);
            return redirect('/');
        }
    }

    
    function registration(){
        if(!session()->has('user')){
            return view('/registration');
        }else{
            return redirect('/');
        }
    }

    function register(Request $req){
        $adduser = new User;
        $adduser->name = $req->name;
        $adduser->email = $req->email;
        $adduser->mobile = $req->mobile;
        $adduser->address = $req->address;
        $adduser->password = Hash::make($req->password);
        $adduser->save();
        session()->flash('status', 'Registration Succcessful! Please Login');
        return view('login');
        
    }
}
