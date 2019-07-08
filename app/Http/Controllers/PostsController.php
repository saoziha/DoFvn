<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use Validator;

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
            $item = Posts::getItemById($id);
            return view('user.posts.detail',compact('item'));
        }
    }
}
