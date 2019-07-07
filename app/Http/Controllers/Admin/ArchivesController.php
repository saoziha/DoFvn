<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Archives;
use Validator;

class ArchivesController extends Controller
{
    public function index(Request $request){
        $items = archives::getAll();
        return view('admin.archives.index',compact('items'));

    }
    public function edit(Request $request,$id){

        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:archives']);
        if($validator->fails()){
            return redirect('admin/archives')
            ->withErrors($validator)
            ->withInput();
        }else{
            if(Archives::edit($request->all(),$id)){
                $request->session()->flash('msg','completed to edit');
                return redirect('admin/archives');
            }else{
                $request->session()->flash('msg','fail to edit');
                return redirect('admin/archives');
            }
        }

    }

}
