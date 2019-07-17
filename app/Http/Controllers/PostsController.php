<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use Validator;
use App\Comment;
use Auth;
use App\Tag;
use App\Category;
use App\Services\Upload\UploadService;

class PostsController extends Controller
{
    public function index(Request $request){

        $input = $request->all();
        $posts = Posts::getAll($input);
        return view('user.posts.index',compact(['posts','input']));
    }

    public function detail($slug,$id){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:posts']);
        if($validator->fails()){
            return redirect('blog');
        }else{
            $comments = Comment::getItemsByPost($id);
            $item = Posts::getItemById($id);
            return view('user.posts.detail',compact(['item','comments']));
        }
    }

    public function list(Request $request)
    {
        $id = Auth::guard('user')->user()->id;
        $items = Posts::getItemsByUser($id);
        return view('user.posts.list',compact('items'));
    }

    public function getAdd(){
        $tags = Tag::getAllToPost();
        $categories = Category::getAllToAdd();
        return view('user.posts.add',compact(['categories','tags']));
    }

    public function doAdd(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required|min:10',
            'title'=>'required|min:20',
            'content'=>'required|min:30',
            'category_id'=>'required'
            ]);
        if($validator->fails()){
            return redirect('user/posts/add')
                    ->withErrors($validator)
                    ->withInput();
        }else{
            if($request->hasFile('image')){
                $filename = UploadService::upload('posts',$request->image);
            }
            $id = Auth::guard('user')->user()->id;
            $name = Auth::guard('user')->user()->name;
            $input = [
                'name'=>$request->name,
                'title'=>$request->title,
                'content'=>$request->content,
                'category_id'=>$request->category_id,
                'tags'=>implode(',',$request->tag),
                'status'=>1,
                'image'=>$filename,
                'top'=>10,
                'user_id'=>$id,
                'create_by'=>$name
            ];
            // dd($input);
            $rs = Posts::add($input);
            if($rs){
                $request->session()->flash('msg','Completed to add');
                return redirect('user/posts');
            }else{
                $request->session()->flash('msg','Fail');
                return redirect('user/posts');
            }
        }
    }

    public function edit($id){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:posts']);
        if($validator->fails()){
            return redirect('user/posts')
                    ->withErrors($validator)
                    ->withInput();
        }else{
            $item = Posts::getItemById($id);
            $categories = Category::getAllToAdd();
            $tags = Tag::getAllToPost();
            return view('user.posts.edit',compact(['tags','item','categories']));
        }
    }
    public function doEdit(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'name'=>'required|min:10',
            'title'=>'required|min:20',
            'content'=>'required|min:30',
            'category_id'=>'required'
            ]);
        if($validator->fails()){
            return redirect("user/posts/$id/edit")
                    ->withErrors($validator)
                    ->withInput();
        }else{
            $user_id = Auth::guard('user')->user()->id;
            $input = [
                'name'=>$request->name,
                'title'=>$request->title,
                'content'=>$request->content,
                'category_id'=>$request->category_id,
                'top'=>10,
                'tags'=>implode(',',$request->tag),
                'status'=>1,
                'user_id'=>$user_id
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
                return redirect('user/posts');
            }else{
                $request->session()->flash('msg','Fail');
                return redirect('user/posts');
            }
        }
    }

    public function delete($id,Request $request){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:posts']);
        if($validator->fails()){
            return redirect('user/posts')
                    ->withErrors($validator)
                    ->withInput();
        }else{
            $user_id = Auth::guard('user')->user()->id;
            $rs = Posts::removeByUser($id,$user_id);
            if($rs){
                $request->session()->flash('msg','Completed to delete');
                return redirect('user/posts');
            }else{
                $request->session()->flash('msg','Fail');
                return redirect('user/posts');
            }
        }
    }

    public function status($id,Request $request){
        $user_id= Auth::guard('user')->user()->id;
        $rs = Posts::status(['status'=>$request->status],$id,$user_id);
        if($rs){
            $request->session()->flash('msg','Completed to edit');
            return redirect('user/posts');
        }else{
            $request->session()->flash('msg','Fail');
            return redirect('user/posts');
        }
    }
}
