<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Posts;
use App\Tag;
use App\Category;
use Validator;
use App\Services\Upload\UploadService;

class PostsController extends Controller
{
    public function index(Request $request){
        $items = Posts::getItems();
        return view('admin.posts.index',compact('items'));
    }

    public function getAdd(){
        $tags = Tag::getAllToPost();
        $categories = Category::getAllToAdd();
        return view('admin.posts.add',compact(['categories','tags']));
    }

    public function doAdd(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|min:10',
            'title'=>'required|min:20',
            'content'=>'required|min:30',
            'category_id'=>'required',
            'top'=>'required'
            ]);
        if($validator->fails()){
            return redirect('admin/posts/add')
                    ->withErrors($validator)
                    ->withInput();
        }else{
            if($request->hasFile('image')){
                $filename = UploadService::upload('posts',$request->image);
            }
            $input = [
                'name'=>$request->name,
                'title'=>$request->title,
                'content'=>$request->content,
                'category_id'=>$request->category_id,
                'tags'=>implode(',',$request->tag),
                'status'=>1,
                'image'=>$filename,
                'top'=>$request->top
            ];
            // dd($input);
            $rs = Posts::add($input);
            if($rs){
                $request->session()->flash('msg','Completed to add');
                return redirect('admin/posts');
            }else{
                $request->session()->flash('msg','Fail');
                return redirect('admin/posts');
            }
        }
    }

    public function edit($id){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:posts']);
        if($validator->fails()){
            return redirect('admin/posts')
                    ->withErrors($validator)
                    ->withInput();
        }else{
            $item = Posts::getItemById($id);
            $categories = Category::getAllToAdd();
            $tags = Tag::getAllToPost();
            return view('admin.posts.edit',compact(['tags','item','categories']));
        }
    }
    public function doEdit(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name'=>'required|min:10',
            'title'=>'required|min:20',
            'content'=>'required|min:30',
            'category_id'=>'required',
            'top'=>'required'
            ]);
        if($validator->fails()){
            return redirect("admin/posts/$id/edit")
                    ->withErrors($validator)
                    ->withInput();
        }else{
            $input = [
                'name'=>$request->name,
                'title'=>$request->title,
                'content'=>$request->content,
                'category_id'=>$request->category_id,
                'top'=>$request->top,
                'tags'=>implode(',',$request->tag),
                'status'=>1,
            ];
            if($request->hasFile('image')){
                $item = Posts::getItemById($id);
                if($item->image!=''){
                    UploadService::deleteFile($item->image);
                }
                $filename = UploadService::upload('posts',$request->image);
                $input['image']=$filename;
            }
            $rs = Posts::edit($input,$id);
            if($rs){
                $request->session()->flash('msg','Completed to edit');
                return redirect('admin/posts');
            }else{
                $request->session()->flash('msg','Fail');
                return redirect('admin/posts');
            }
        }
    }

    public function delete($id,Request $request){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:posts']);
        if($validator->fails()){
            return redirect('admin/posts')
                    ->withErrors($validator)
                    ->withInput();
        }else{
            $rs = Posts::remove($id);
            if($rs){
                $request->session()->flash('msg','Completed to delete');
                return redirect('admin/posts');
            }else{
                $request->session()->flash('msg','Fail');
                return redirect('admin/posts');
            }
        }
    }

    public function status($id,Request $request){
        $rs = Posts::edit(['status'=>$request->status],$id);
        if($rs){
            $request->session()->flash('msg','Completed to edit');
            return redirect('admin/posts');
        }else{
            $request->session()->flash('msg','Fail');
            return redirect('admin/posts');
        }
    }
}
