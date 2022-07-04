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
        foreach((array)$request->input(
            'dest','area_id','date','comment','image','category_id','created_at','updated_at',
        ) as $key => $val)
        {
            dd($request);
            Post::create([
                'dest' => $request->input('dest')[$key],
                'area_id' => $request->input('area')[$key],
                'date' => $request->input('date')[$key],
                'comment' => $request->input('comment')[$key],
                'image' => $request->input('image')[$key],
                'category_id' => $request->input('category')[$key],
                'created_at' => now()[$key],
                'updated_at' => now()[$key],
            ]);

            if($request->image !== null){
                $posts->image = $request
                    ->file('image');
            }
            if(null!==($request->file('image'))){
                $fileName = $request
                    ->file('image');
                $path = $request
                    ->file('image')
                    ->storeAs('public/post',$fileName);
            }
            $posts->image->save();

            return redirect()->route('post_list');
        }
    }
}
