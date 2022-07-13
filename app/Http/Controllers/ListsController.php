<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lists;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ListsController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'list' => 'max:100'
        ],[
            'list.max' => '100文字以内で入力してください。'
        ]);
        $list = new Lists;

        $list->user_id = Auth::id();
        $list->list = $request->list;
        $list->created_at = now();
        $list->updated_at = now();
        $list->save();

        return redirect()->route('search');
    }
    public function show()
    {
        $lists = DB::table('lists')
            ->where('user_id',Auth::id())
            ->select('list','created_at')
            ->get();
        return view('auth.mypage',['lists' => $lists]);
    }
}
