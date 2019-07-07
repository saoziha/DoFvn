<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table='image';
    protected $fillable= ['link','status','gallery_id'];

    public static function getAllByGallery($gallery_id){
        return Self::where('gallery_id',$gallery_id)->orderBy('id')->get();
    }

    public static function add($input){
        $input['status']=1;
        return Self::create($input)->id;
    }

    public static function edit($input,$id){
        unset($input['_token']);
        $image = Self::where('id',$id);
        $image->update($input);
        return $image->first();
    }

    public static function remove($id){
        $image = Self::where('id',$id);
        $gallery_id= $image->first()->gallery_id;
        $image->delete();
        return $gallery_id;
    }

    public static function getItemById($id){
        return Self::where('id',$id)->first();
    }
}
