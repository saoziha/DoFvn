<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Posts;
use App\Tag;

class PostsController extends Controller
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
            $items = Posts::getAll($request->search,$request->page_limit,$request->page);
            return view('admin.posts.index',compact('items'));
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
            $tags = Tag::getAllToPost();
            return view('admin.posts.add',compact('tags'));
        }catch (\Illuminate\Database\QueryException $ex) {
                \Log::error("[" . __METHOD__ . "][" . __LINE__ . "]" . "error" . $ex->getMessage());
            $this->error = $ex->getMessage();
        } catch (\Illuminate\Exception $ex) {
            \Log::error("[" . __METHOD__ . "][" . __LINE__ . "]" . "error" . $ex->getMessage());
            $this->error = $ex->getMessage();
        }
    }

}
