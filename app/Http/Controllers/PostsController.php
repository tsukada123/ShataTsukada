<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function index(){
        return view('posts.index');
    }

    public function logout(Request $request){
        Auth::logout();
        return view('auth.login');
    }
}
