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
            ->paginate(5,["*"],'contactpage')
            ->appends(["todopage" => \Request::get('todopage')]);

        $lists = DB::table('lists')
            ->where('user_id',Auth::id())
            ->select('id','list','created_at')
            ->paginate(5,["*"],'todopage')
            ->appends(["contactpage" => \Request::get('contactpage')]);

        $date = [
            'msg' => $msg,
            'contacts' => $contacts,
            'lists' => $lists,
        ];

        return view('auth.mypage',$date,['contacts' => $contacts]);
    }
}
