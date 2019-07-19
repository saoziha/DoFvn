<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Posts extends Model
{
    protected $table='posts';
    protected $fillable=['name','title','image','content','comments','create_by','tags','status','top','category_id','user_id'];

    public static function getAll($input,$search='',$page_limit=8,$page=1){
        $posts = Posts::join('category','posts.category_id','=','category.id');
        if(isset($input['search'])){
            $search=$input['search'];
        }
        $posts->whereRaw("(posts.name like '%$search%' or posts.title like '%$search%' or posts.content like '%$search%') and posts.status = 1");
        if(isset($input['category'])&& !empty($input['category'])){
            $posts->where('posts.category_id',$input['category']);
        }
        if(isset($input['archives'])&& !empty($input['archives'])){
            $posts->whereRaw("MONTH(posts.created_at)= {$input['archives']}");
        }
        if(isset($input['tag'])&& !empty($input['tag'])){
            $posts->whereRaw("POSITION({$input['tag']} IN posts.tags)>-1");
        }

        return $posts->select(DB::raw('posts.*,category.name AS category_name'))->paginate($page_limit);
    }

    public static function getItemsPopular(){
        return Self::where('status',1)->orderBy('comments','desc')->paginate(3);
    }

    public static function getItems(){
        return Self::orderBy('id','desc')->get();
    }

    public static function getItemsByUser($id){
        return Self::where('user_id',$id)->orderBy('id','desc')->get();
    }

    public static function getItemById($id){
        return Self::join('category','posts.category_id','=','category.id')->select(DB::raw('posts.*,category.name AS category_name'))->where('posts.id',$id)->first();
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
    public static function removeByUser($id,$user_id){
        return Posts::where('id',$id)->where('user_id',$user_id)->delete();
    }

    public static function add($input){
        // dd($input);
        return Posts::create($input)->id;
    }

    public static function status($input,$id,$user_id){
        return Posts::where('id',$id)->where('user_id',$user_id)->update($input);
    }

    public static function updateComment($id){
        $posts = Posts::where('id',$id)->first();
        $comments = $posts->comments + 1;
        return Self::where('id',$id)->update(['comments'=>$comments]);

    }

    public static function downComment($id){
        $posts = Posts::where('id',$id)->first();
        $comments = $posts->comments - 1;
        return Self::where('id',$id)->update(['comments'=>$comments]);

    }
}
