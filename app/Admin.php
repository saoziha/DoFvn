<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin  extends Authenticatable
{
    protected $table='admin';
    protected $datetime="U";
    protected $primaryKey='id';
    protected $fillable=['name','email','avatar','email_verified_at','password','status'];
    protected $hidden=['password'];

    public static function getItemById($id){
        return Self::where('id',$id)->first();
    }

    public static function edit($input,$id){
        unset($input['_token']);
        return Self::where('id',$id)->update($input);
    }
}
