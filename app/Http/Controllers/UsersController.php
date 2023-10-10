<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        $users = DB::table('users')->get();
        // dd($users);
        return view('users.search',['users'=>$users]);
    }
    public function AddUser(Request $request){
        $id = \Auth::user()->id;
        $FollowId = $request->input('id');
        // dd($FollowId);
        DB::table('follows')->insert([
            'follower'=>$id,
            'follow'=>$FollowId
        ]);
        return redirect('search');
    }

    public function DeleteUser(){
        DB::table('follows')
            ->where('follower',$FollowId)
            ->delete();
        return redirect('search');
    }
}
