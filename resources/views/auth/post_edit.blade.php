@extends('auth.loginpage')

@section('content')
<div class="sub_title">
    <h2>Post edit</h2>
</div>

<div class="">
    <div>
        {!! Form::open(['url' => "post_edit/{{$up_post->id}}",'enctype' => 'multipart/form-data','method' => 'POST']) !!}
        {{ csrf_field() }}
        <div class="post_title">
            <div>
                {{ Form::label('dest','Destination') }}
                {{ Form::text('dest',"$up_post->dest",['class' => 'dest']) }}
                @foreach ($errors->get('dest') as $error)
                    <div>
                        <strong class="errors">{{ $error }}</strong>
                    </div>
                @endforeach
            </div>
            <div>
                {{ Form::label('area_id','Area') }}
                {{ Form::select('area_id',config('tag.tag_area'),"$up_post->area_id",['class' => 'area']) }}
                @foreach ($errors->get('area_id') as $error)
                    <div>
                        <strong class="errors">{{ $error }}</strong>
                    </div>
                @endforeach
            </div>
            <div>
                {{ Form::label('pref','Prefecture') }}
                {{ Form::select('pref',config('tag.tag_pref'),"$up_post->pref",['class' => 'pref']) }}
                @foreach ($errors->get('pref') as $error)
                    <div>
                        <strong class="errors">{{ $error }}</strong>
                    </div>
                @endforeach
            </div>
            <div>
                {{ Form::label('date','Date') }}
                {{ Form::text('date',"$up_post->date",['class' => 'date','placeholder' => 'DD/MMM/YY']) }}
                @foreach ($errors->get('date') as $error)
                    <div>
                        <strong class="errors">{{ $error }}</strong>
                    </div>
                @endforeach
            </div>
            <div class="post_caution">
                <small>※画像は1枚2MB,トータル20MBまでアップロードできます。<br></small>
                <small>※画像の拡張子はJPEG,PNG,BMPでアップロードしてください。</small>
            </div>
        </div>
        <div class="post_edit_img">
            @foreach($posts as $index => $post)
                <div class="post_edit_content">
                    <div>
                        <input type="text" name="id{{$index}}" class="post_edit_id" value="{{$post->id}}">
                    </div>
                    <div id="image_insert" class="post_edit_center">
                        <label for="image{{$index}}" class="post_edit_label">IconImage
                            <img src="/storage/posts/{{$post->image}}" class="edit_image" value="{{$post->image}}">
                        </label>
                        <div class="image_post">
                            <input type="hidden" name="image{{$index}}" class="img_file" value="{{$post->image}}">
                            <input type="file" name="image{{$index}}" class="img_file" id="image{{$index}}" data-target="post{{$index}}" value="{{$post->image}}">
                        </div>
                    </div>
                    <div class="image_name post_edit_name" id="post{{$index}}">
                        <span>{{$post->image}}</span>
                    </div>
                    <div class="post_edit_comment">
                        <label for="comment{{$index}}" class="">Comment</label>
                        <input type="text" name="comment{{$index}}" class="" value="{{$post->comment}}">
                    </div>
                    <div class="post_edit_category">
                        <label for="category{{$index}}" class="">Category</label>
                        <div class="post_edit_center">
                        <select name="category{{$index}}" id="category" class="post_edit_label">
                            @foreach(Config::get('tag.tag_category') as $key => $val)
                                <option value="{{$key}}"
                                    @if($post->category_id == $key)
                                        selected
                                    @endif
                                    >{{$val}}
                                </option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ Form::submit('Post',['class' => 'post_edit_btn']) }}


        {!! Form::close() !!}
    </div>
</div>

@endsection