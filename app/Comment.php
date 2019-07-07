<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Comment extends Model
{
    protected $table=  'comment';
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
        return Self::where('id',$id)->delete();
    }
}
