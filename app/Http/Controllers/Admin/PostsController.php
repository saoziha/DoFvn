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
                'tag'=>implode(',',$request->tag),
                'status'=>1,
                'image'=>$filename
            ];
            // dd($input);
            $rs = Posts::add($input);
            if($rs>0){
                $request->session()->flash('msg','Completed to add');
                return redirect('admin/posts');
            }else{
                $request->session()->flash('msg','Fail');
                return redirect('admin/posts');
            }
        }
    }

}
