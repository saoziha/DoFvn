<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use Validator;

class TagController extends Controller
{
    public function index(Request $request){
        try{

            if(!isset($request->search)){
                $request->search='';
            }
            if(!isset($request->page_limit)){
                $request->page_limit=15;
            }
            if(!isset($request->page)){
                $request->page=1;
            }
            $items = Tag::getAll($request->search,$request->page_limit,$request->page);
            return view('admin.tag.index',compact('items'));
        }catch (\Illuminate\Database\QueryException $ex) {
                \Log::error("[" . __METHOD__ . "][" . __LINE__ . "]" . "error" . $ex->getMessage());
            $this->error = $ex->getMessage();
        } catch (\Illuminate\Exception $ex) {
            \Log::error("[" . __METHOD__ . "][" . __LINE__ . "]" . "error" . $ex->getMessage());
            $this->error = $ex->getMessage();
        }
    }

    public function getAdd(){
        try{
            return view('admin.tag.add');
        }catch (\Illuminate\Database\QueryException $ex) {
                \Log::error("[" . __METHOD__ . "][" . __LINE__ . "]" . "error" . $ex->getMessage());
            $this->error = $ex->getMessage();
        } catch (\Illuminate\Exception $ex) {
            \Log::error("[" . __METHOD__ . "][" . __LINE__ . "]" . "error" . $ex->getMessage());
            $this->error = $ex->getMessage();
        }
    }

    public function doAdd(Request $request){
         try{
            $validator = Validator::make($request->all(),['name'=>'required|min:2']);
            if($validator->fails()){
                return redirect('admin/tag/add')
                        ->withErrors($validator)
                        ->withInput();
            }else{
                if(Tag::add($request->all())){
                    $request->session()->flash('msg','Completed to add');
                    return redirect('admin/tag');
                }else{
                    $request->session()->flash('msg','Fail');
                    return redirect('admin/tag');
                }
            }
        }catch (\Illuminate\Database\QueryException $ex) {
                \Log::error("[" . __METHOD__ . "][" . __LINE__ . "]" . "error" . $ex->getMessage());
            $this->error = $ex->getMessage();
        } catch (\Illuminate\Exception $ex) {
            \Log::error("[" . __METHOD__ . "][" . __LINE__ . "]" . "error" . $ex->getMessage());
            $this->error = $ex->getMessage();
        }
    }

    public function edit(Request $request,$id){
         try{
            $validator = Validator::make(['id'=>$id],['id'=>'required|exists:tag']);
            if($validator->fails()){
                return redirect('admin/tag')
                ->withErrors($validator)
                ->withInput();
            }else{
               if(Tag::edit($request->all(),$id)){
                   $request->session()->flash('msg','completed to edit');
                   return redirect('admin/tag');
               }else{
                    $request->session()->flash('msg','fail to edit');
                    return redirect('admin/tag');
               }
            }
        }catch (\Illuminate\Database\QueryException $ex) {
                \Log::error("[" . __METHOD__ . "][" . __LINE__ . "]" . "error" . $ex->getMessage());
            $this->error = $ex->getMessage();
        } catch (\Illuminate\Exception $ex) {
            \Log::error("[" . __METHOD__ . "][" . __LINE__ . "]" . "error" . $ex->getMessage());
            $this->error = $ex->getMessage();
        }
    }

    public function delete($id){
        try{
           $validator = Validator::make(['id'=>$id],['id'=>'required|exists:tag']);
           if($validator->fails()){
               return redirect('admin/tag')
               ->withErrors($validator)
               ->withInput();
           }else{
              if(Tag::remove($id)){
                    request()->session()->flash('msg','completed to delete');
                    return redirect('admin/tag');
              }else{
                    request()->session()->flash('msg','fail to delete');
                    return redirect('admin/tag');
              }
           }
       }catch (\Illuminate\Database\QueryException $ex) {
               \Log::error("[" . __METHOD__ . "][" . __LINE__ . "]" . "error" . $ex->getMessage());
           $this->error = $ex->getMessage();
       } catch (\Illuminate\Exception $ex) {
           \Log::error("[" . __METHOD__ . "][" . __LINE__ . "]" . "error" . $ex->getMessage());
           $this->error = $ex->getMessage();
       }
   }
}
