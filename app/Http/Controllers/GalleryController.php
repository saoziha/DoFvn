<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Image;
use App\Category;
use Validator;
use App\Services\Upload\UploadService;
use Auth;
class GalleryController extends Controller
{
    public function home(){
        $items = Image::getItems();
        return view('user.home.index',compact('items'));
    }

    public function index(){
        $items = Image::getItems();
        return view('user.gallery.index',compact('items'));
    }

    public function list(Request $request){
        $user_id = Auth::guard('user')->user()->id;;
        $items = Gallery::getAllByUser($user_id);
        $categories = Category::getAllToAdd();
        return view('user.gallery.list',compact(['items','categories']));
    }

    public function getAdd(){
        $categories = Category::getAll();
        return view('user.gallery.add',compact('categories'));
    }

    public function doAdd(Request $request){
        $validator = Validator::make($request->all(),['name'=>'required|min:2']);
        if($validator->fails()){
            return redirect('user/gallery/add')
                    ->withErrors($validator)
                    ->withInput();
        }else{
            $user_id = Auth::guard('user')->user()->id;;
            $input = $request->all();
            $input['user_id']=$user_id;

            if($id = Gallery::add($input)){
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
                return redirect('user/gallery');
            }else{
                $request->session()->flash('msg','Fail');
                return redirect('user/gallery');
            }
        }
    }

    public function edit(Request $request,$id){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:gallery']);
        if($validator->fails()){
            return redirect('user/gallery')
            ->withErrors($validator)
            ->withInput();
        }else{
            if(Gallery::edit($request->all(),$id)){
                $request->session()->flash('msg','completed to edit');
                return redirect('user/gallery');
            }else{
                $request->session()->flash('msg','fail to edit');
                return redirect('user/gallery');
            }
        }
    }

    public function delete($id){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:gallery']);
        if($validator->fails()){
            return redirect('user/gallery')
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
                return redirect('user/gallery');
            }else{
                request()->session()->flash('msg','fail to delete');
                return redirect('user/gallery');
            }
        }
    }
}
