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

        $images = DB::table('posts')
            ->where('area_id',$id)
            ->select('id','comment','image','dest')
            ->get();

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
    public function update(PostRequest $request,Post $post)
    {
        for ($i = 0; $i < 10; $i++) {
            if (!empty($request->input('dest'))) {
                if(!empty($request->file("image{$i}"))){
                    $file = $request->file("image{$i}");
                    $filename = $file->getClientOriginalName();
                    $path = $file->storeAs('public/posts',$filename);
                    $post->where('id',$request->input("id{$i}"))
                    ->update([
                        'image' => $filename
                    ]);
                    }

                $post->where('id',$request->input("id{$i}"))
                    ->update([
                    'user_id' => Auth::id(),
                    'dest' => $request->input('dest'),
                    'area_id' => $request->input('area_id'),
                    'pref' => $request->input('pref'),
                    'date' => $request->input('date'),
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
    public function edit_delete($id)
    {
        DB::table('posts')
            ->where('id',$id)
            ->delete();
        return redirect('post_list');
    }
}
