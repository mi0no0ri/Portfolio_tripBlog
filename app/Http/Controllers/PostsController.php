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
        if(null!==($request->file('image'))){
        $fileName = $request
            ->file('image');
        $path = $request
            ->file('image')
            ->storeAs('public/post',$fileName);

        Post::create([
            'dest' => $request->input('dest'),
            'area_id' => $request->input('area'),
            'date' => $request->input('date'),
            'comment' => $request->input('comment'),
            'image' => $request->input($path),
            'category_id' => $request->input('category'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('post_list');
        }
    }
    public function delete()
    {
        DB::table('posts')
            ->where('id',$id)
            ->delete();
        return redirect('/post_list');
    }
}
