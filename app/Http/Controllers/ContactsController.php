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
            ->latest()
            ->get();

        $todo = DB::table('lists')
            ->where('user_id',Auth::id())
            ->select('id','list','created_at')
            ->orderBy('id','desc')
            ->paginate(3);

        $data = [
            'msg' => $msg,
            'todo' => $todo,
        ];

        return view('auth.mypage',$data,['contacts' => $contacts,'todo' => $todo]);
    }
    public function show()
    {
        $forms = DB::table('contacts')
            ->select('title','comment','name','email','created_at')
            ->latest()
            ->paginate(5);

        return view('auth.contactForm',['forms' => $forms]);
    }
}
