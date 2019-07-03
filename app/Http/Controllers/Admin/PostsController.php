<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index(){
        $item='abc';
        return view('admin.posts.index',compact('item'));
    }
}
