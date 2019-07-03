<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table='admin';
    protected $datetime="U";
    protected $primaryKey='id';
    protected $fillable=['name','email','avatar','email_verified_at','password','status'];
}
