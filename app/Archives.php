<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Archives extends Model
{
    protected $table='archives';
    protected $datetime='U';

    protected $fillable=['name','month','status'];

    public static function getAll(){
        return Self::orderBy('month')->get();
    }

    public static function getAllToPost(){
        return DB::select('SELECT archives.*,(SELECT COUNT(*) from posts WHERE MONTH(posts.created_at)= archives.month and posts.status=1 ) AS sum FROM `archives` WHERE status = 1');
    }

    public static function edit($input,$id){
        unset($input['_token']);
        return Self::where('id',$id)->update($input);
    }

}
