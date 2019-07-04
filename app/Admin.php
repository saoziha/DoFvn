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
}
