<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'comment' => 'required|max:50',
            'name' => 'required|max:10',
            'email' => 'max:30'
        ],[
            'title.required' => 'タイトルは必須です。',
            'comment.required' => 'コメントは必須です。',
            'comment.max' => '最大50文字で入力してくだいさい。',
            'name.required' => 'お名前は必須です。',
            'name.max' => '最大10文字で入力してください。',
            'email.max' => '最大30文字で入力してください。'
        ]);

        $contact = Contact::create([
            'title' => $request->title,
            'comment' => $request->comment,
            'name' => $request->name,
            'email' => $request->email,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect('/contact');
    }
    public function view(Request $request)
    {
        $id = $request->query('page');
        $msg = 'show page: ' . $id;

        $contacts = DB::table('contacts')
        ->select('title','comment','name','email','created_at')
        ->paginate(5);

        $date = [
            'msg' => $msg,
            'date' => $contacts,
        ];

        $lists = DB::table('lists')
            ->where('user_id',Auth::id())
            ->select('id','list','created_at')
            ->paginate(5);

        return view('auth.mypage',$date,['contacts' => $contacts,'lists' => $lists]);
    }
}
