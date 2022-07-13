<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
            ->where('id',Auth::id())
            ->select('id','username','kana','bio','image')
            ->first();
        return view('layouts.profile',['profiles'=>$profiles]);
    }
    public function profile_edit(Request $request){
        $user = Auth::user();

        $request->validate([
            'username' => 'required|max:20',
            'kana' => 'required|max:40',
            'email' => 'required|max:40',
            'password' => 'nullable|max:20|alpha_num',
            'bio' => 'required|max:100',
            'image' => 'image|file|mimes:jpg,png,bmp,gif,svg',
        ],[
            'username.required' => '必須項目です',
            'username.max' => '最大20文字で入力してください。',
            'kana.required' => '必須項目です',
            'kana.max' => '最大40文字で入力してください。',
            'email.required' => '必須項目です',
            'email.max' => '最大40文字で入力してください。',
            'password.max' => '最大40文字で入力してください。',
            'password.alpha_num' => 'アルファベットと数字で入力してください。',
            'bio.required' => '必須項目です',
            'bio.max' => '最大100文字で入力してください。',
            'image.image' => '指定されたファイルが画像ではありません。',
            'image.mimes' => '指定された拡張子（JPG、PNG、BMP、GIF、SVG）ではありません。',
        ]);

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
}
