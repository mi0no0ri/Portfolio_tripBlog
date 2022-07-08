<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\DB;

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
    public function view()
    {
        $contacts = DB::table('contacts')
            ->select('title','comment','name','email','created_at')
            ->get();

        return view('auth.mypage',['contacts' => $contacts]);
    }
}
