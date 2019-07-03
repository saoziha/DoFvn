<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archives extends Model
{
    protected $table='archives';
    protected $datetime='U';

    protected $fillable=['name','month','status'];
}
