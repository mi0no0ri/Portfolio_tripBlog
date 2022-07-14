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
        $request->validate(
            [
                'area_id' => '',
                'dest' => 'required|max:10',
                'date' => 'required|max:10',
                'comment' => 'max:15',
                'image' => 'image|file|mimes:jpg,png,bmp|max:2048'
            ],[
                'area_id.required' => 'エリアは必須項目です。',
                'dest.required' => '旅行先は必須項目です。',
                'dest.max' => '最大10文字までで入力してください。',
                'date.required' => '日にちは必須項目です。',
                'date.max' => '最大10文字までで入力してください。',
                'comment.max' => '最大15文字までで入力してください。',
                'image.image' => '指定されたファイルが画像ではありません。',
                'image.mimes' => '指定された拡張子（JPG、PNG、BMP）ではありません。',
                'image.max' => '最大2MBまでで投稿してください。',
            ]
        );

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
            ->groupBy('date')
            ->pluck('id');
        $posts = DB::table('posts')
            ->where('user_id',1)
            ->whereIn('id',$ids)
            ->where('area_id',$id)
            ->select('id','area_id','dest','date','comment')
            ->get();

        foreach($posts as $key => $val) {
        $images = DB::table('posts')
            ->where('user_id',1)
            ->where('area_id',$id)
            ->whereIn('dest',[$key => $val->dest])
            ->whereIn('date',[$key => $val->date])
            ->select('id','comment','image')
            ->get();
        }

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
    public function show_update($id)
    {
        $up_post = DB::table('posts')
            ->where('id',$id)
            ->first();

        $posts = DB::table('posts')
            ->where('dest',$up_post->dest)
            ->where('date',$up_post->date)
            ->select('id','dest','date','image','comment','category_id')
            ->get();
        return view('auth.post_edit',['up_post' => $up_post,'posts' => $posts]);
    }
    public function update($id,Request $request)
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
}
