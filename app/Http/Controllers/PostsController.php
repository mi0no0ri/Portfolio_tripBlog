<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Filesystem\Filesystem\File;
use App\Http\Requests\PostRequest;
use Validator;

class PostsController extends Controller
{
    public function create(PostRequest $request)
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
                    'pref' => $request->input('pref'),
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
            ->groupBy('date')
            ->pluck('id');
        $posts = DB::table('posts')
            ->where('user_id',1)
            ->whereIn('id',$ids)
            ->where('area_id',$id)
            ->select('id','area_id','dest','date','comment','image')
            ->get();
            // dd($posts);

        foreach($posts as $key => $val) {
            $images = DB::table('posts')
                ->where('user_id',1)
                ->where('area_id',$id)
                ->whereIn('dest',[$val->dest])
                ->whereIn('date',[$val->date])
                ->select('id','comment','image',)
                ->get()
                ->toArray();
                // dd([$val->dest]);
            }
            dd($images);

        return view('japan_maps.gallery',['posts' => $posts,'images' => $images]);
    }
    public function delete($id)
    {
        $del = DB::table('posts')
            ->where('id',$id)
            ->select('dest','date','area_id')
            ->first();
        DB::table('posts')
            ->where('area_id',$del->area_id)
            ->where('dest',$del->dest)
            ->where('date',$del->date)
            ->delete();
        return redirect('/post_list');
    }
    public function show_update($id)
    {
        $up_post = DB::table('posts')
            ->where('id',$id)
            ->first();

        $posts = DB::table('posts')
            ->where('area_id',$up_post->area_id)
            ->where('dest',$up_post->dest)
            ->where('date',$up_post->date)
            ->select('id','dest','date','image','comment','category_id')
            ->get();
        return view('auth.post_edit',['up_post' => $up_post,'posts' => $posts]);
    }
    public function update($id,PostRequest $request)
    {
        for ($i = 1; $i <= 10; $i++) {
            if (!empty($request->input("comment{$i}"))) {
                if($request->file("image{$i}") !== null){
                $filename = $request->file("image{$i}")->getClientOriginalName();
                $path = $request->file("image{$i}")->storeAs('public/posts',$filename);
                }

                DB::table('posts')
                    ->where('id',$id)
                    ->update([
                    'user_id' => Auth::id(),
                    'dest' => $request->input('dest'),
                    'area_id' => $request->input('area'),
                    'pref' => $request->input('pref'),
                    'date' => $request->input('date'),
                    'image' => $filename,
                    'comment' => $request->input("comment{$i}"),
                    'category_id' => $request->input("category{$i}"),
                    'updated_at' => now(),
                ]);
            } else {
                break;
            }
        }
        return redirect('/post_list');
    }
    public function category($id)
    {
        $title = DB::table('posts')
            ->where('category_id',$id)
            ->select('category_id')
            ->first();
        $cateTitle = config("tag.tag_category.$title->category_id");

        $categorys = DB::table('posts')
            ->where('category_id',$id)
            ->select('id','area_id','dest','date','comment','image')
            ->get();
        return view('layouts.category',['cateTitle' => $cateTitle,'categorys' => $categorys]);
    }
}
