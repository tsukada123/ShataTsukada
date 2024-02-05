<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function index(){
        //　<※1>
        $posts = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->select('posts.id', 'posts.user_id', 'posts.posts', 'posts.created_at', 'users.username','users.images')
                ->get();


        $users_image=DB::table('users')
            ->where('id',Auth::user()->id)
                ->select('images')
                    ->first();
        $follow_numbers=DB::table('follows')
            ->where('follower',Auth::user()->id)->count();
        $follower_numbers=DB::table('follows')
            ->where('follow',Auth::user()->id)->count();

        //dd($users_image);
        return view('posts.index',[
            'posts'=>$posts,
            'follow_numbers'=>$follow_numbers,
            'follower_numbers'=>$follower_numbers,
            'users_image'=>$users_image
        ]);

    }

    public function tweet(Request $request){
        $id = \Auth::user()->id;
        $post = $request->input('newTweet');

        DB::table('posts')->insert([
            'user_id'=>$id,
            'posts'=>$post
        ]);

        return redirect('/index');
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
            return redirect('/index');
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


// ※1 joinを使って、postsテーブルのユーザー情報とusersテーブルのユーザー情報を結合して取得する（参考:https://readouble.com/laravel/6.x/ja/queries.html）
