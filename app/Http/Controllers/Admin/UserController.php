<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use App\Services\Upload\UploadService;

class UserController extends Controller
{
    public function index(Request $request){
        $items = User::getAll();
        return view('admin.user.index',compact('items'));

    }

    public function getAdd(){
        return view('admin.user.add');
    }

    public function doAdd(Request $request){

        $validator = Validator::make($request->all(),[
            'name'=>'required|min:10',
            'email'=>'required|email',
            'password'=>'required|min:8'
            ]);
        if($validator->fails()){
            return redirect('admin/user/add')
                    ->withErrors($validator)
                    ->withInput();
        }else{
            $filename='user.png';
            if($request->hasFile('avatar')){
                $filename = UploadService::upload('user',$request->avatar);
            }
            $input = [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'status'=>1,
                'avatar'=>$filename
            ];
            if(User::add($input)){
                $request->session()->flash('msg','Completed to add');
                return redirect('admin/user');
            }else{
                $request->session()->flash('msg','Fail');
                return redirect('admin/user');
            }
        }

    }

    public function edit(Request $request,$id){

        $validator = Validator::make([
            'name'=>$request->name,
            'email'=>$request->email,
            'id'=>$id
        ],[
            'id'=>'required|exists:user',
            'name'=>'required|min:10',
            'email'=>'required|email'
            ]);
        if($validator->fails()){
            return redirect('admin/user')
            ->withErrors($validator)
            ->withInput();
        }else{
            if($request->hasFile('avatar')){
                $filename='';
                $filename = UploadService::upload('user',$request->avatar);
                $userinfo = User::getItemById($id);
                if($userinfo->avatar!='user.png'){
                    UploadService::deleteFile($userinfo->avatar);
                }
                $input = [
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'status'=>1,
                    'avatar'=>$filename
                ];
            }else{
                $input = [
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'status'=>1,
                ];
            }
            if($request->password != ''){
                $input['password']=bcrypt($request->password);
            }
            if(User::edit($input,$id)){
                $request->session()->flash('msg','completed to edit');
                return redirect('admin/user');
            }else{
                $request->session()->flash('msg','fail to edit');
                return redirect('admin/user');
            }
        }

    }

    public function editStatus(Request $request,$id){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:user']);
        if($validator->fails()){
            return redirect('admin/user')
            ->withErrors($validator)
            ->withInput();
        }else{
            if(User::edit($request->all(),$id)){
                $request->session()->flash('msg','completed to edit');
                return redirect('admin/user');
            }else{
                $request->session()->flash('msg','fail to edit');
                return redirect('admin/user');
            }
        }
    }

    public function delete($id){

        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:user']);
        if($validator->fails()){
            return redirect('admin/user')
            ->withErrors($validator)
            ->withInput();
        }else{
            if(User::remove($id)){
                request()->session()->flash('msg','completed to delete');
                return redirect('admin/user');
            }else{
                request()->session()->flash('msg','fail to delete');
                return redirect('admin/user');
            }
        }
    }
}
