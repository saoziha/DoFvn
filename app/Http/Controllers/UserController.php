<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Comment;
use App\Posts;
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
}
