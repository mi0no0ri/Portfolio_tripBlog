<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;

class ContactsController extends Controller
{
    public function create(CommentRequest $request)
    {
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
        if($request !== null){
        $id = $request->query('page');
        $msg = 'show page: ' . $id;

        $contacts = DB::table('contacts')
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