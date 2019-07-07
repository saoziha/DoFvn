<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Validator;

class CategoryController extends Controller
{
    public function index(Request $request){
        $items = Category::getAll();
        return view('admin.category.index',compact('items'));
    }

    public function getAdd(){
        return view('admin.category.add');
    }

    public function doAdd(Request $request){
        $validator = Validator::make($request->all(),['name'=>'required|min:2']);
        if($validator->fails()){
            return redirect('admin/category/add')
                    ->withErrors($validator)
                    ->withInput();
        }else{
            if(Category::add($request->all())){
                $request->session()->flash('msg','Completed to add');
                return redirect('admin/category');
            }else{
                $request->session()->flash('msg','Fail');
                return redirect('admin/category');
            }
        }
    }

    public function edit(Request $request,$id){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:category']);
        if($validator->fails()){
            return redirect('admin/category')
            ->withErrors($validator)
            ->withInput();
        }else{
            if(Category::edit($request->all(),$id)){
                $request->session()->flash('msg','completed to edit');
                return redirect('admin/category');
            }else{
                $request->session()->flash('msg','fail to edit');
                return redirect('admin/category');
            }
        }
    }

    public function delete($id){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:category']);
        if($validator->fails()){
            return redirect('admin/category')
            ->withErrors($validator)
            ->withInput();
        }else{
            if(Category::remove($id)){
                request()->session()->flash('msg','completed to delete');
                return redirect('admin/category');
            }else{
                request()->session()->flash('msg','fail to delete');
                return redirect('admin/category');
            }
        }
    }
}
