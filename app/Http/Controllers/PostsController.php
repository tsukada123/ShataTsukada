<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function index(){
        $posts = DB::table('posts')->get();
        // dd($posts);
        return view('posts.index',['posts'=>$posts]);

    }

    public function tweet(Request $request){
        $id = \Auth::user()->id;
        $post = $request->input('newTweet');

        DB::table('posts')->insert([
            'user_id'=>$id,
            'posts'=>$post
        ]);

        return redirect('index');
    }

    public function upPost(Request $request){
        $id=$request->input('id');
        $upPost=$request->input('upPost');
        // dd($id);
        DB::table('posts')
            ->where('id',$id)
            ->update(
                ['posts'=>$upPost]
            );
    }

    public function delete($id){
       // dd($id);
        DB::table('posts')
            ->where('id',$id)
            ->delete();

        return redirect('index');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('login');// returnではなくredirectが正解
    }
}
