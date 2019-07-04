<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
class AdminController extends Controller
{
    public function login(){
        return View('admin.login');
    }

    public function doLogin(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>"required|email|min:5",
            'password'=>'required|min:8'
        ]);
        if($validator->fails()){
            return redirect('admin/login')
            ->withErrors($validator)
            ->withInput();
        }else{
            if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
                $admin = Auth::guard('admin')->user();

                $admin->remember_token=str_random(60);
                $admin->save();
                return redirect('admin');
            }else{
                return redirect('admin/login')
                ->withErrors($validator->errors()->add('msg','Login fail'))
                ->withInput();
            }
        }
    }

    public function logout($id){
        $validator = Validator::make(['id'=>$id],[
            'id'=>"required|exists:admin"
        ]);
        if($validator->fails()){
            return redirect('admin/login')
            ->withErrors($validator)
            ->withInput();
        }else{
            $admin = Auth::guard('admin')->user();

            $admin->remember_token=null;
            $admin->save();
            Auth::guard('admin')->logout();
            return redirect('admin/login');
        }
    }
}
