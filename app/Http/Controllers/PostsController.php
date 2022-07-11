<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Filesystem\Filesystem\File;

class PostsController extends Controller
{
    public function create(Request $request)
    {
        for ($i = 1; $i <= 10; $i++) {
            if (!empty($request->input("comment{$i}"))) {
                $filename = $request->file("image{$i}")->getClientOriginalName();
                $path = $request->file("image{$i}")->storeAs($filename, 'public');

                $post = new Post();

                $post->create([
                    'user_id' => Auth::id(),
                    'dest' => $request->input('dest'),
                    'area_id' => $request->input('area'),
                    'date' => $request->input('date'),
                    'image' => $path,
                    'comment' => $request->input("comment{$i}"),
                    'category_id' => $request->input("category{$i}"),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                break;
            }
        }

        return redirect()->route('post_list');
    }
    public function show($id)
    {
        $posts = DB::table('posts')
            ->where('user_id',1)
            ->where('area_id',$id)
            ->select('id','area_id','category_id','dest','date','comment','image')
            ->get();
        return view('japan_maps.gallery',['posts' => $posts]);
    }
    public function delete($id)
    {
        DB::table('posts')
            ->where('id',$id)
            ->delete();
        return redirect('/post_list');
    }
    public function update($id)
    {
        $up_post = DB::table('posts')
            ->where('id',$id)
            ->first();
        return view('auth.post_edit',['up_post' => $up_post]);
    }
}
