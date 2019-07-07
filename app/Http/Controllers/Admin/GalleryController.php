<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Gallery;
use App\Image;
use Validator;
use App\Services\Upload\UploadService;

class GalleryController extends Controller
{
    public function index(Request $request){
        $items = Gallery::getAll();
        $categories = Category::getAllToAdd();
        return view('admin.gallery.index',compact(['items','categories']));
    }

    public function getAdd(){
        $categories = Category::getAll();
        return view('admin.gallery.add',compact('categories'));
    }

    public function doAdd(Request $request){
        $validator = Validator::make($request->all(),['name'=>'required|min:2']);
        if($validator->fails()){
            return redirect('admin/gallery/add')
                    ->withErrors($validator)
                    ->withInput();
        }else{

            if($id = Gallery::add($request->all())){
                if($request->hasFile('images')){
                    foreach($request->images as $item){
                        $link = UploadService::upload('gallery',$item);
                        Image::add([
                            'link'=>$link,
                            'gallery_id'=>$id
                        ]);
                    }
                }
                $request->session()->flash('msg','Completed to add');
                return redirect('admin/gallery');
            }else{
                $request->session()->flash('msg','Fail');
                return redirect('admin/gallery');
            }
        }
    }

    public function edit(Request $request,$id){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:gallery']);
        if($validator->fails()){
            return redirect('admin/gallery')
            ->withErrors($validator)
            ->withInput();
        }else{
            if(Gallery::edit($request->all(),$id)){
                $request->session()->flash('msg','completed to edit');
                return redirect('admin/gallery');
            }else{
                $request->session()->flash('msg','fail to edit');
                return redirect('admin/gallery');
            }
        }
    }

    public function delete($id){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:gallery']);
        if($validator->fails()){
            return redirect('admin/gallery')
            ->withErrors($validator)
            ->withInput();
        }else{
            $images = Image::getAllByGallery($id);
            foreach($images as $item){
                UploadService::deleteFile($item->link);
                Image::remove($item->id);
            }
            if(Gallery::remove($id)){
                request()->session()->flash('msg','completed to delete');
                return redirect('admin/gallery');
            }else{
                request()->session()->flash('msg','fail to delete');
                return redirect('admin/gallery');
            }
        }
    }
}
