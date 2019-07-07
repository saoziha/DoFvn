<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archives extends Model
{
    protected $table='archives';
    protected $datetime='U';

    protected $fillable=['name','month','status'];

    public static function getAll(){
        return Self::orderBy('month')->get();
    }

    public static function getAllToPost(){
        return Self::where('status',1)->get();
    }

    public static function edit($input,$id){
        unset($input['_token']);
        return Self::where('id',$id)->update($input);
    }

}
