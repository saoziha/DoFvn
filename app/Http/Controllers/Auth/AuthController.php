<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AuthController extends Controller
{
    public function getLogin(){
        return view('auth.auth.login');
    }
    public function postLogin(LoginRequest $request){
        $username=$request->username;
        $password=$request->password;
        $user= User::select('*')->where("username",'=',$username)->first();
        if($user->status=="1"){
            $result=Auth::attempt(['username'=>$username,'password'=>$password]);
            if($result){
                return redirect()->route('admin.index.index');
            }else{
                $request->session()->flash("msg","tài khoản hoặc mật khẩu không đúng");
                return redirect()->route('auth.auth.login');
            }
        }else{
            $request->session()->flash("msg","tài khoản bạn đã bị khóa");
            return redirect()->route('auth.auth.login');
        }       
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('auth.auth.login');
    }
    public function postPublicLogin(LoginRequest $request){
        $username=$request->username;
        $password=$request->password;
        $user= User::select('*')->where("username",'=',$username)->first();
        
        if(is_null($user)){
            $ar=array('kq'=>0,'value'=>"Tài khoản hoặc mật khẩu không đúng");
        }
        elseif($user->status=="1"){
            $result=Auth::attempt(['username'=>$username,'password'=>$password]);
            if($result){
                $ar=array('kq'=>1,'url'=>url()->current());
               
            }else{
                $ar=array('kq'=>0,'value'=>"Tài khoản hoặc mật khẩu không đúng");
                                
            }
        }else{
            $ar=array('kq'=>-1,'value'=>"Tài khoản này đã bị khóa");
             
        }
         return json_encode($ar);
    }
    
    public function publicLogout(){
        Auth::logout();
        return redirect()->route('tratienhuong.index.index');
    }
}
