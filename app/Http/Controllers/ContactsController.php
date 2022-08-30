<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class ContactsController extends Controller
{
    public function contact(){
        $users = DB::table('users')
            ->select('id','username')
            ->get();
        return view('layouts.contact',['users' => $users]);
    }
    public function create(CommentRequest $request)
    {
        $contact = Contact::create([
            'user_id' => $request->id,
            'title' => $request->title,
            'comment' => $request->comment,
            'name' => $request->name,
            'email' => $request->email,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect("contact");
    }
    public function mypage(Request $request)
    {
        if($request !== null){
        $id = $request->query('page');
        $msg = 'show page: ' . $id;

        $contacts = DB::table('contacts')
            ->where('user_id',Auth::id())
            ->select('title','comment','name','email','created_at')
            ->latest()
            ->paginate(5);

        $todo = DB::table('lists')
            ->where('user_id',Auth::id())
            ->select('id','list','created_at')
            ->orderBy('id','desc')
            ->paginate(5);

        $data = [
            'msg' => $msg,
            'todo' => $todo,
        ];
        }
        $pref = DB::table('posts')
            ->where('user_id',Auth::id())
            ->select('pref')
            ->groupBy('pref')
            ->get('pref');

        return view('auth.mypage',$data,['contacts' => $contacts,'todo' => $todo,'pref' => $pref]);
    }
    public function show()
    {
        $forms = DB::table('contacts')
            ->select('title','comment','name','email','created_at')
            ->latest()
            ->paginate(10);

        return view('auth.contactForm',['forms' => $forms]);

    }
}