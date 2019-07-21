<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Comment;
use App\Posts;
use App\User;
use App\Services\Upload\UploadService;

class UserController extends Controller
{
    public function login(){
        return View('user.login');
    }

    public function doLogin(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>"required|email|min:5",
            'password'=>'required|min:8'
        ]);
        if($validator->fails()){
            return redirect('user/login')
            ->withErrors($validator)
            ->withInput();
        }else{
            if(Auth::guard('user')->attempt(['email'=>$request->email,'password'=>$request->password])){
                $user = Auth::guard('user')->user();

                $user->remember_token=str_random(60);
                $user->save();
                return redirect('/');
            }else{
                return redirect('user/login')
                ->withErrors($validator->errors()->add('msg','Login fail'))
                ->withInput();
            }
        }
    }

    public function logout($id){
        $validator = Validator::make(['id'=>$id],[
            'id'=>"required|exists:user"
        ]);
        if($validator->fails()){
            return redirect('user/login')
            ->withErrors($validator)
            ->withInput();
        }else{
            $user = Auth::guard('user')->user();

            $user->remember_token=null;
            $user->save();
            Auth::guard('user')->logout();
            return redirect('user/login');
        }
    }

    public function comment(Request $request){
        $input = $request->all();
        $user = Auth::guard('user')->user();
        $input['user_id']=$user->id;
        $id = Comment::add($input);
        if($id>0){
            $rs = Posts::updateComment($input['post_id']);
            return Comment::getItemById($id);
        }else{
            return false;
        }
    }

    public function removeComment(Request $request){
        $id = $request->id;
        $rs = Comment::remove($id);
        if($rs>0){
            return $rs;
        }else{
            return false;
        }
    }

    public function profile(){
        $user_id = Auth::guard('user')->user()->id;
        $item = User::getItemById($user_id);
        return view('user.profile',compact('item'));
    }

    public function changeProfile(Request $request){
        $validator = Validator::make([
            'name'=>$request->name
        ],[
            'name'=>'required|min:10'
        ]);
        if($validator->fails()){
            return redirect('user/profile')
            ->withErrors($validator)
            ->withInput();
        }else{
            $user_id = Auth::guard('user')->user()->id;
            if($request->hasFile('avatar')){
                $filename='';
                $filename = UploadService::upload('user',$request->avatar);
                $userinfo = User::getItemById($user_id);
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
            if(User::edit($input,$user_id)){
                $request->session()->flash('msg','completed to edit');
                return redirect('user/profile');
            }else{
                $request->session()->flash('msg','fail to edit');
                return redirect('user/profile');
            }
        }
    }

    public function register(){
        return view('user.register');
    }

    public function doRegister(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|min:10',
            'email'=>'required|email',
            'password'=>'required|min:8'
            ]);
        if($validator->fails()){
            return redirect('user/register')
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
                $request->session()->flash('msg','Completed to register');
                return redirect('user/login');
            }else{
                $request->session()->flash('msg','Fail');
                return redirect('user/login');
            }
        }
    }
}
