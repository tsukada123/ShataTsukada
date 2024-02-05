<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller{

    public function profile(){
        return view('users.profile');
    }

    // ユーザ検索機能（全ユーザーの表示）
    public function search(){
        $users = DB::table('users')->get();
        $follow_numbers=DB::table('follows')
            ->where('follower',Auth::user()->id)->count();
        $follower_numbers=DB::table('follows')
            ->where('follow',Auth::user()->id)->count();
        return view('users.search',[
            'users'=>$users,
            'follow_numbers'=>$follow_numbers,
            'follower_numbers'=>$follower_numbers
        ]);
    }

    // ユーザー検索機能（検索したユーザーの表示）
    public function search_result(Request $request){
        $partial_name=$request->input('keyword');
        $users=DB::table('users')
            ->where('username','like',"%".$partial_name."%")
            ->get();
        $follow_numbers=DB::table('follows')
            ->where('follower',Auth::user()->id)->count();
        $follower_numbers=DB::table('follows')
            ->where('follow',Auth::user()->id)->count();
        return view('users.search',[
            'users'=>$users,
            'partial_name'=>$partial_name,
            'follow_numbers'=>$follow_numbers,
            'follower_numbers'=>$follower_numbers
        ]);
    }

    // 他ユーザーのフォロー機能
    public function addFollow(Request $request){
        $id = \Auth::user()->id;
        $followId=$request->input('id');
        DB::table('follows')->insert([
            'follow'=>$followId,
            'follower'=>$id
        ]);
        return redirect('/search');
    }

    // フォローユーザーの削除
    public function deleteFollow($id){
        DB::table('follows')
            ->where('follow',$id)
            ->delete();
        return redirect('search');
    }
}
