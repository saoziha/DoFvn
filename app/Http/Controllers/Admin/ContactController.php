<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Validator;
use App\Services\Mail\MailService;

class ContactController extends Controller
{
    public function index($status=1){
        $items = Contact::getAll($status);
        return view('admin.contact.index',compact('items'));

    }
    public function edit(Request $request,$id){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:contact']);
        if($validator->fails()){
            return redirect('admin/contact/0')
            ->withErrors($validator)
            ->withInput();
        }else{
            if(Contact::edit($request->all(),$id)){
                $request->session()->flash('msg','completed to edit');
                return redirect('admin/contact/0');
            }else{
                $request->session()->flash('msg','fail to edit');
                return redirect('admin/contact/0');
            }
        }
    }
    public function send(Request $request,$id){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:contact']);
        if($validator->fails()){
            return redirect('admin/contact/0')
            ->withErrors($validator)
            ->withInput();
        }else{
            $rs = MailService::sendMail('Dofvn',$request->mail,$request->subject,$request->description,"Dofvn");
            if($rs){
                Contact::edit(['status'=>1],$id);
                $request->session()->flash('msg','completed to reply');
                return redirect('admin/contact/0');
            }else{
                $request->session()->flash('msg','fail to reply');
                return redirect('admin/contact/0');
            }
        }
    }

    public function delete($id){
        $validator = Validator::make(['id'=>$id],['id'=>'required|exists:contact']);
        if($validator->fails()){
            return redirect('admin/contact/0')
            ->withErrors($validator)
            ->withInput();
        }else{
            if(Contact::remove($id)){
                request()->session()->flash('msg','completed to delete');
                return redirect('admin/contact/0');
            }else{
                request()->session()->flash('msg','fail to delete');
                return redirect('admin/contact/0');
            }
        }
    }
}
