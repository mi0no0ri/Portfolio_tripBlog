<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Filesystem\Filesystem\File;
use Validator;

class PostsController extends Controller
{
    public function create(Request $request)
    {
        for ($i = 1; $i <= 10; $i++) {
            if (!empty($request->input("comment{$i}"))) {
                $filename = $request->file("image{$i}")->getClientOriginalName();
                $path = $request->file("image{$i}")->storeAs('public/posts',$filename);

                $post = new Post();

                $post->create([
                    'user_id' => Auth::id(),
                    'dest' => $request->input('dest'),
                    'area_id' => $request->input('area'),
                    'date' => $request->input('date'),
                    'image' => $filename,
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
        $ids = DB::table('posts')
            ->selectRaw('min(id) as id')
            ->groupBy('dest')
            ->pluck('id');
        $posts = DB::table('posts')
            ->where('user_id',Auth::id())
            ->whereIn('id',$ids)
            ->where('area_id',$id)
            ->select('id','area_id','dest','date','comment')
            ->get();

        $date = DB::table('posts')
            ->where('user_id',Auth::id())
            ->where('area_id',$id)
            ->whereIn('id',$ids)
            ->select('dest','date')
            ->get();
        $images = DB::table('posts')
            ->where('user_id',Auth::id())
            ->where('area_id',$id)
            ->where('dest','Izumo')
            ->select('id','comment','image')
            ->get();

        return view('japan_maps.gallery',['posts' => $posts,'images' => $images]);
    }
    public function delete($id)
    {
        $del = DB::table('posts')
            ->where('id',$id)
            ->select('dest','date')
            ->first();
        DB::table('posts')
            ->where('dest',$del->dest)
            ->where('date',$del->date)
            ->delete();
        return redirect('/post_list');
    }
    public function update($id)
    {
        $up_post = DB::table('posts')
            ->where('id',$id)
            ->first();

        $posts = DB::table('posts')
            ->where('dest',$up_post->dest)
            ->select('id','dest','date','image','comment','category_id')
            ->get();
        return view('auth.post_edit',['up_post' => $up_post,'posts' => $posts]);
    }
}
