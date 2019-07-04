<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table=  'tag';
    protected $fillable=['name','status'];

     public static function getAll($search,$page_limit=10,$page=1){
        return Self::whereRaw("name like '%$search%'")->paginate($page_limit);
    }

    public static function getAllToPost(){
        return Self::where('status',1)->get();
    }

    public static function add($input){
        $input['status']=1;
        return Self::create($input)->id;
    }
}
