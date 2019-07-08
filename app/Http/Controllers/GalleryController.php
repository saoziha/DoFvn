<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Image;
class GalleryController extends Controller
{
    public function home(){
        $items = Image::getItems();
        return view('user.home.index',compact('items'));
    }

    public function index(){
        $items = Image::getItems();
        return view('user.gallery.index',compact('items'));
    }
}
