<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use Validator;
class CommentController extends Controller
{
    public function index(Request $request){
        $items = Comment::getAll();
        return view('admin.comment.index',compact('items'));

    }
    public function edit(Request $request,$id){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:comment']);
        if($validator->fails()){
            return redirect('admin/comment')
            ->withErrors($validator)
            ->withInput();
        }else{
            if(Comment::edit($request->all(),$id)){
                $request->session()->flash('msg','completed to edit');
                return redirect('admin/comment');
            }else{
                $request->session()->flash('msg','fail to edit');
                return redirect('admin/comment');
            }
        }
    }

    public function delete($id){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:comment']);
        if($validator->fails()){
            return redirect('admin/comment')
            ->withErrors($validator)
            ->withInput();
        }else{
            if(Comment::remove($id)){
                request()->session()->flash('msg','completed to delete');
                return redirect('admin/comment');
            }else{
                request()->session()->flash('msg','fail to delete');
                return redirect('admin/comment');
            }
        }
    }
}
