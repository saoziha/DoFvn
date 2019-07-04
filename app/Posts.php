<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table='posts';
    protected $fillable=['name','title','image','content','comments','create_by','tags','status','top'];

    public static function getAll($search,$page_limit=10,$page=1){
        return Self::whereRaw("name like '%$search%' or title like '%$search%' or content like '%$search%'")->paginate($page_limit);
    }

    public static function getItemById($id){
        return Self::where('id',$id)->first();
    }

    public static function edit($input,$id){
        $post = Posts::where('id',$id);
        $post->update($input);
        return $post->first();
    }

    public static function detail($id){
        return  Posts::where('id',$id)->first();
    }

    public static function remove($id){
        return Posts::where('id',$id)->delete();
    }

    public static function add($input){
        return Posts::create($input)->id;
    }
}
