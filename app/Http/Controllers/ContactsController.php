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
    public function view(Request $request)
    {
        $id = $request->query('page');
        $msg = 'show page: ' . $id;

        $contacts = DB::table('contacts')
        ->select('title','comment','name','email','created_at')
        ->paginate(5);

        $date = [
            'msg' => $msg,
            'contacts' => $contacts,
        ];

        return view('auth.mypage',$date,['contacts' => $contacts]);
    }
}
