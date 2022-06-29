<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function create(Request $request)
    {
        foreach($request->all() as $key => $val)
        {
            if(null!==($request->file('image'))){
                $fileName = $request
                    ->file('image');
                $path = $request
                    ->file('image')
                    ->storeAs('public/storage',$fileName);
            } else {
                $fileName = '';
            }
            $posts = new Post;

            $posts->user_id = Auth::id();
            $posts->dest = $request->dest;
            $posts->area_id = $request->area;
            $posts->date = $request->date;
            $posts->image = $fileName;
            $posts->comment = $request->comment;
            $posts->category_id = $request->category;
            $posts->created_at = now();
            $posts->updated_at = now();
            $posts->save();

            return redirect()->route('post_list');
        }
    }
}
