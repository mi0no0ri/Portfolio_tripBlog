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
    public function profile($id){
        $profiles = DB::table('users')
            ->where('id',$id)
            ->select('id','username','kana','bio','image','back_image')
            ->first();

        $ids = DB::table('posts')
            ->where('user_id',$id)
            ->selectRaw('min(id) as id')
            ->groupBy('dest')
            ->groupBy('date')
            ->pluck('id');
        $posts = DB::table('posts')
            ->where('user_id',$id)
            ->whereIn('id',$ids)
            ->select('id','area_id','dest','date','comment','image')
            ->get();
        $images = DB::table('posts')
            ->where('user_id',$id)
            ->select('id','comment','image','dest','date')
            ->get();

        return view('layouts.profile',['profiles'=>$profiles,'posts' => $posts,'images' => $images]);
    }
    public function profile_edit(ProfileRequest $request){
        $user = Auth::user();

        $user->fill($request->except('password','image','back_image'));

        if(null!==$request->password){
            $user->password = bcrypt($request->input('password'));
        }

        if(!empty($request->file("image"))){
            $file = $request->file("image");
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('public/images',$filename);
            $user->image = $filename;
            }

        if(!empty($request->file("back_image"))){
            $back = $request->file("back_image");
            $backname = $back->getClientOriginalName();
            $path = $back->storeAs('public/images',$backname);
            $user->back_image = $backname;
        }

        $user->updated_at = now();
        $user->save();

        return redirect()->route('profile_edit',['user' => $user]);
    }
    public function top()
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
            ->select('category_id')
            ->groupBy('category_id')
            ->get();
        $cate_images = DB::table('posts')
            ->select('category_id','image')
            ->inRandomOrder()
            ->get();

        $back = DB::table('posts')
            ->select('image')
            ->inRandomOrder()
            ->first();
        return view('layouts.top',['area' => $area,'new' => $new,'categories' => $categories,'cate_images' => $cate_images,'back' => $back]);
    }
    public function search(Request $request) {
        $keyword = $request
            ->input('search');

        $results = DB::table('users')
            ->where('username','LIKE',"%{$keyword}%")
            ->orWhere('kana','LIKE',"%{$keyword}%")
            ->join('posts','users.id','=','posts.user_id')
            ->select('users.id','users.kana','users.username','users.image','posts.user_id')
            ->groupBy('users.id')
            ->get();

        $count_post = DB::table('posts')
            ->selectRaw('min(id) as id')
            ->groupBy('user_id')
            ->groupBy('dest')
            ->groupBy('date')
            ->count();

        return view('layouts.search',['results' => $results,'count_post' => $count_post]);
    }
}
