<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Posts;
class Comment extends Model
{
    protected $table=  'comment';
    protected $datetime="U";
    protected $fillable=['user_id','post_id','reply_id','content','reply','status'];


    public static function getAll(){
        $comment = Comment::join('user','comment.user_id','=','user.id');
        $comment->join('posts','comment.post_id','=','posts.id');
        return  $comment->select(DB::raw('comment.*,posts.name as post_name,user.name as user_name'))->orderBy('id','desc')->get();
    }

    public static function getAllToPost(){
        $comment = Comment::join('user','comment.user_id','=','user.id');
        $comment->join('posts','comment.post_id','=','posts.id');
        return $comment->where('status',1)->select(DB::raw('comment.*,posts.name as post_name,user.name as user_name'))->orderBy('id','desc')->get();
    }

    public static function edit($input,$id){
        unset($input['_token']);
        return Self::where('id',$id)->update($input);
    }

    public static function remove($id){
        $com = Comment::where('id',$id);
        $rs=0;
        if($list = Comment::where('reply_id',$id)->get()){
            foreach($list as $item){
                $rs = Posts::downComment($item->post_id);
                Self::where('id',$item->id)->delete();
            }
        }

        Posts::downComment($com->first()->post_id);
        $com->delete();
        if($rs!=0){
            return $rs;
        }else{
            return 1;
        }
    }

    public static function getItemsByPost($post_id){
        $comment = Comment::join('user','comment.user_id','=','user.id');
        $comment->join('posts','comment.post_id','=','posts.id');
        return $comment->where('comment.post_id',$post_id)->where('comment.status',1)->select(DB::raw('comment.*,posts.name as post_name,user.name as user_name,user.avatar'))->orderBy('id','desc')->get();
    }

    public static function add($input){
        return Self::create($input)->id;
    }

    public static function getItemById($id){
        return Self::join('user','comment.user_id','=','user.id')->select(DB::raw('comment.*,user.name as user_name,user.avatar'))->where('comment.id',$id)->first()->toArray();
    }
}
