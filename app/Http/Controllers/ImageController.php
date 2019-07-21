<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Category;
use Validator;
use App\Services\Upload\UploadService;
class ImageController extends Controller
{
    public function index(Request $request,$id){
        $items = Image::getAllByGallery($id);
        $categories = Category::getAll();
        return view('user.image.index',compact(['items','categories','id']));
    }

    public function getAdd($id){
        return view('user.image.add',compact('id'));
    }

    public function doAdd(Request $request,$id){

        if($request->hasFile('image')){
            $filename = UploadService::upload('gallery',$request->image);
            $input = [
                'link'=>$filename,
                'gallery_id'=>$id
            ];
            if(Image::add($input)){
                $request->session()->flash('msg','Completed to add');
                return redirect('user/image/'.$id.'/list');
            }else{
                $request->session()->flash('msg','Fail');
                return redirect('user/image/'.$id.'/list');
            }
        }else{
            $request->session()->flash('msg','Fail');
            return redirect('user/image/'.$id.'/list');
        }
    }

    public function edit(Request $request,$id){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:image']);
        if($validator->fails()){
            return redirect('user/image')
            ->withErrors($validator)
            ->withInput();
        }else{
            if($request->hasFile('link')){
                $filename='';
                $filename = UploadService::upload('user',$request->link);
                $image = Image::getItemById($id);
                if($image->link!=''){
                    UploadService::deleteFile($image->link);
                }
                $input = [
                    'link'=>$filename
                ];
                $rs= Image::edit($input,$id);
                if($rs != null){
                    $request->session()->flash('msg','completed to edit');
                    return redirect('user/image/'.$rs->gallery_id.'/list');
                }else{
                    $request->session()->flash('msg','fail to edit');
                    return redirect('user/image/'.$rs->gallery_id.'/list');
                }
            }
            else{
                $request->session()->flash('msg','completed to edit');
                return redirect('user/image/'.$rs->gallery_id.'/list');
            }
        }
    }

    public function delete($id){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:image']);
        if($validator->fails()){
            return redirect('user/gallery')
            ->withErrors($validator)
            ->withInput();
        }else{
            $gallery_id = Image::remove($id);
            if($gallery_id > -1){
                request()->session()->flash('msg','completed to delete');
                return redirect('user/image/'.$gallery_id.'/list');
            }else{
                request()->session()->flash('msg','fail to delete');
                return redirect('user/image/'.$gallery_id.'/list');
            }
        }
    }
}
