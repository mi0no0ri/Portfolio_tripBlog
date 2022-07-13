<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lists;

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

        return view('/mypage');
    }
}
