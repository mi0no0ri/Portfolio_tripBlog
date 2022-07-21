<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lists;
use App\Gone;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ListRequest;

class ListsController extends Controller
{
    public function create(ListRequest $request)
    {
        $list = new Lists;

        $list->user_id = Auth::id();
        $list->list = $request->list;
        $list->created_at = now();
        $list->updated_at = now();
        $list->save();

        return redirect()->route('todo');
    }
    public function delete($id)
    {
        DB::table('lists')
        ->where('id',$id)
        ->delete();
        return redirect('/mypage');
    }
}
