<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Gallery extends Model
{
    protected $table=  'gallery';
    protected $fillable=['name','status','category_id'];


    public static function getAll(){
        $gallery = Gallery::join('category','gallery.category_id','=','category.id');
        return $gallery->select(DB::raw('gallery.* ,category.name as category_name'))->orderBy('id','desc')->orderBy('name')->get();
    }

    public static function getAllToPost(){
        return Self::where('status',1)->get();
    }

    public static function add($input){
        $input['status']=1;
        return Self::create($input)->id;
    }

    public static function edit($input,$id){
        unset($input['_token']);
        return Self::where('id',$id)->update($input);
    }

    public static function remove($id){
        return Self::where('id',$id)->delete();
    }

    public static function getItemById($id){
        return Self::where('id',$id)->first();
    }

}
