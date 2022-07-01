<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        return view('auth.profile_edit',['auth' => $auth]);
    }
    public function login(){
        return view('layouts.login');
    }
    public function contact(){
        return view('layouts.contact');
    }
    public function profile(){
        $profiles = DB::table('users')
            ->where('id',Auth::id())
            ->select('id','username','kana','bio','image')
            ->first();
        return view('layouts.profile',['profiles'=>$profiles]);
    }
    public function profile_edit(Request $request){
        $user = Auth::user();

        $user->kana = $request
            ->input('kana');
        $user->username = $request
            ->input('username');
        $user->email = $request
            ->input('email');
        $user->bio = $request
            ->input('bio');

        if($request->password !== null){
            $user->password = bcrypt($request->input('password'));
        }
        if($request->image !== null){
            $user->image = $request
                ->file('image');
        }
        $user->updated_at = now();
        $user->save();

        return redirect()->route('profile_edit',['user' => $user]);
    }
}
