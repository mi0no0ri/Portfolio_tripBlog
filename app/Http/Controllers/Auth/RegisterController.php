<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/added';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest',['except' => 'added']);
        $this->redirectTo = route('login');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    public function register(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate([
                'username' => 'required|string|max:20',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'password-confirm' => 'required|string|min:6|same:password'
                ],[
                'username.required' => 'お名前を入力してください。',
                'username.max' => 'お名前は20文字以内で入力してください。',
                'email.required' => 'emailを入力してください。',
                'email.email' => '正しいemailを入力してください。',
                'email.max' => 'emailは255文字以内で入力してください。',
                'email.unique' => 'そのメールアドレスはすでに登録されています。',
                'password.required' => 'パスワードを入力してください。',
                'password.min' => 'パスワードは6文字以上で入力してください。',
                'password.confirmed' => '入力されたパスワードが一致しません。',
                ]);
            $data = $request->input();

            $this->create($data);
            return view('auth.added');
        }
        return view('auth.register');
    }
    public function added(Request $request)
    {
        return view('auth.added');
    }
}
