<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table='contact';
    protected $datetime="vi";

    protected $fillable=[
        'name','mail','subject','message','status'
    ];
    public static function getAll($status){
        return Self::where('status',$status)->orderBy('id','desc')->get();
    }
    public function getItemById($id){
        return Self::where('id',$id)->first();
    }
    public static function add($input){
        $input['status']=0;
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
