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
        $area = DB::table('posts')
            ->select('area_id')
            ->groupBy('area_id')
            ->get('area_id');

        $today = today();
        $new = DB::table('posts')
            ->select('created_at')
            ->whereDate('created_at',$today)
            ->orderBy('created_at','desc')
            ->get();

        $categories = DB::table('posts')
            ->where('user_id',1)
            ->select('category_id')
            ->groupBy('category_id')
            ->get();
        return view('layouts.top',['area' => $area,'new' => $new,'categories' => $categories]);
    }
}
