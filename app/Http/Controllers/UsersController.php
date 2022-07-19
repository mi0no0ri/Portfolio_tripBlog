<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use App\User;

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
            ->where('id',1)
            ->select('id','username','kana','bio','image')
            ->first();
        return view('layouts.profile',['profiles'=>$profiles]);
    }
    public function profile_edit(ProfileRequest $request){
        $user = Auth::user();

        $user->fill($request->except('password','image'));

        if(null!==$request->password){
            $user->password = bcrypt($request->input('password'));
        }
        if($request->image !== null){
            $user->image = $request
                ->file('image');
        }

        if(null!==($request->file('image'))){
            $fileName = $request
                ->file('image');
            $path = $request
                ->file('image')
                ->storeAs('public/images',$fileName);
        }

        $user->updated_at = now();
        $user->save();

        return redirect()->route('profile_edit',['user' => $user]);
    }
    public function topPage()
    {
        $pref = DB::table('posts')
            ->select('area_id')
            ->groupBy('area_id')
            ->get('area_id');
        return view('layouts.top',['pref' => $pref]);
    }
}
