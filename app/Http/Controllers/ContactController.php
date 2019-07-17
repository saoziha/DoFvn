<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Contact;
class ContactController extends Controller
{
    public function index(){
        $about = About::getInfo();
        return view('user.contact.index',compact('about'));
    }

    public static function send(Request $request){
        $input = [
            'name'=>$request->name,
            'mail'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->description
        ];
        if(Contact::add($input)){
            return redirect('contact')->with('alert','completed to send message');
        }else{
            return redirect('contact')->with('alert','fail');
        }
    }
}
