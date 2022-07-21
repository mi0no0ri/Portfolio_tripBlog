<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')
            ->only(['post_list','profile_edit','mypage'])
            ->except('logout');
    }
    protected function logout(Request $request)
    {
        $user = Auth::user();

        Auth::logout();
        return redirect('/login');
    }
    public function loginpage()
    {
        return view('auth.loginpage');
    }
    public function post_list()
    {
        $id = Auth::user('id')
            ->get();

        $ids = DB::table('posts')
            ->selectRaw('min(id) as id')
            ->groupBy('area_id')
            ->groupBy('date')
            ->groupBy('dest')
            ->pluck('id');
        $posts = DB::table('posts')
            ->whereIn('id',$ids)
            ->latest()
            ->get();
        return view('auth.post_list',['posts' => $posts]);
    }
    public function profile_edit()
    {
        return view('auth.profile_edit');
    }
    public function post()
    {
        return view('auth.post');
    }
    public function mypage()
    {
        $pref = DB::table('posts')
            ->select('pref')
            ->groupBy('pref')
            ->get('pref');
            dd($pref);
        return view('auth.mypage',['pref' => $pref]);
    }
    public function redirectTo()
    {
        return 'mypage';
    }
}
