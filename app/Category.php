<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    protected $table=  'category';
    protected $fillable=['name','status'];


    public static function getAll(){
        return Self::orderBy('status','desc')->orderBy('name')->get();
    }
    public static function getAllToAdd(){
        return Self::where('status',1)->orderBy('name')->get();
    }
    public static function getAllToPost(){
        return DB::select('SELECT category.*,(SELECT COUNT(*) from posts WHERE posts.category_id=category.id and posts.status=1) AS sum FROM `category` WHERE status = 1');
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
}
