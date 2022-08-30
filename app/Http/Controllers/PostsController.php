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
    public function post_list()
    {
        $id = Auth::user('id')
            ->get();

        $ids = DB::table('posts')
            ->selectRaw('min(id) as id')
            ->groupBy('area_id')
            ->groupBy('date')
            ->groupBy('dest')
            ->pluck('id');
        $posts = DB::table('posts')
            ->whereIn('id',$ids)
            ->where('user_id',Auth::id())
            ->latest()
            ->paginate(10);
        return view('auth.post_list',['posts' => $posts]);
    }
    public function delete($id)
    {
        $del = DB::table('posts')
            ->where('id',$id)
            ->select('dest','date','area_id')
            ->first();
        DB::table('posts')
            ->where('user_id',Auth::id())
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
            ->where('user_id',Auth::id())
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
    public function edit_delete($id)
    {
        DB::table('posts')
            ->where('id',$id)
            ->delete();
        return redirect('post_list');
    }
    public function show($id,$pref)
    {
        $ids = DB::table('posts')
            ->where('user_id',$id)
            ->selectRaw('min(id) as id')
            ->groupBy('dest')
            ->groupBy('date')
            ->pluck('id');
        $posts = DB::table('posts')
            ->where('user_id',$id)
            ->whereIn('id',$ids)
            ->where('pref',$pref)
            ->select('id','area_id','dest','date','comment','image')
            ->get();

        $images = DB::table('posts')
            ->where('user_id',$id)
            ->where('pref',$pref)
            ->select('id','comment','image','dest','date')
            ->get();

        return view('japan_maps.gallery',['posts' => $posts,'images' => $images]);
    }
    public function category($id)
    {
        $title = DB::table('posts')
            ->where('category_id',$id)
            ->select('category_id')
            ->first();
        $cateTitle = config("tag.tag_category.$title->category_id");

        $categories = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->where('category_id',$id)
            ->select('posts.id','posts.user_id','area_id','dest','date','comment','posts.image','users.username')
            ->get();
        return view('layouts.category',['cateTitle' => $cateTitle,'categories' => $categories]);
    }
    public function gallery($area_id)
    {
        $ids = DB::table('posts')
            ->selectRaw('min(id) as id')
            ->groupBy('user_id')
            ->groupBy('dest')
            ->groupBy('date')
            ->pluck('id');

        $galleries = DB::table('posts')
            ->join('users','posts.user_id','=','users.id')
            ->whereIn('posts.id',$ids)
            ->where('area_id',$area_id)
            ->select('posts.id','user_id','pref','dest','date','username','users.image')
            ->get();

        $area = DB::table('posts')
            ->whereIn('id',$ids)
            ->where('area_id',$area_id)
            ->select('area_id')
            ->first();
    return view('japan_maps.gallery_list',['galleries' => $galleries,'area' => $area]);
    }
}
