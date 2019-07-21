<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Admin;
use App\Services\Upload\UploadService;

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

    public function profile(){
        $admin_id = Auth::guard('admin')->user()->id;
        $item = Admin::getItemById($admin_id);
        return view('admin.profile',compact('item'));
    }

    public function changeProfile(Request $request){
        $validator = Validator::make([
            'name'=>$request->name
        ],[
            'name'=>'required|min:10'
        ]);
        if($validator->fails()){
            return redirect('admin/profile')
            ->withErrors($validator)
            ->withInput();
        }else{
            $admin_id = Auth::guard('admin')->user()->id;
            if($request->hasFile('avatar')){
                $filename='';
                $filename = UploadService::upload('admin',$request->avatar);
                $userinfo = Admin::getItemById($admin_id);
                if($userinfo->avatar!='user.png'){
                    UploadService::deleteFile($userinfo->avatar);
                }
                $input = [
                    'name'=>$request->name,
                    'avatar'=>$filename
                ];
            }else{
                $input = [
                    'name'=>$request->name
                ];
            }
            if($request->password != ''){
                $input['password']=bcrypt($request->password);
            }
            if(Admin::edit($input,$admin_id)){
                $request->session()->flash('msg','completed to edit');
                return redirect('admin/profile');
            }else{
                $request->session()->flash('msg','fail to edit');
                return redirect('admin/profile');
            }
        }
    }
}
