@extends('auth.loginpage')

@section('content')
<div class="sub_title">
    <h2>Post edit</h2>
</div>

<div class="post_title">
    <div>
        {!! Form::open(['url' => "post_edit/{{$up_post->id}}",'enctype' => 'multipart/form-data','method' => 'POST']) !!}
        {{ csrf_field() }}
        <div class="post_title">
            <div>
                {{ Form::label('dest','Destination') }}
                {{ Form::text('dest',"$up_post->dest",['class' => 'dest']) }}
            </div>
            <div>
                {{ Form::label('area_id','Area') }}
                {{ Form::select('area_id',['0' => '','1' => 'Hokkaido','2' => 'Tohoku','3' => 'Kanto','4' => 'Chubu','5' => 'Kansai','6' => 'Chugoku','7' => 'Shikoku','8' => 'Kyushu','9' => 'Okinawa'],"$up_post->area_id",['class' => 'area']) }}
            </div>
            <div>
                {{ Form::label('date','Date') }}
                {{ Form::text('date',"$up_post->date",['class' => 'date','placeholder' => 'DD/MMM/YY']) }}
            </div>
        </div>
        <div class="post_edit_img">
            @foreach($posts as $index => $post)
                <div class="post_edit_content">
                    <div id="image_insert" class="post_edit_center">
                        <label for="image{{$index}}" class="post_edit_label">IconImage
                            <img src="/storage/posts/{{$post->image}}" class="edit_image">
                        </label>
                        <div class="image_post">
                            <input type="hidden" name="image{{$index}}" class="img_file">
                            <input type="file" name="image{{$index}}" class="img_file" id="image{{$index}}" data-target="post{{$index}}" value="{{$post->image}}">
                        </div>
                    </div>
                    <div class="image_name" id="post{{$index}}">
                        <span>{{$post->image}}</span>
                    </div>
                    <div class="post_edit_comment">
                        <label for="comment{{$index}}" class="">Comment</label>
                        <input type="text" name="comment{{$index}}" class="" value="{{$post->comment}}">
                    </div>
                    <div class="">
                        <label for="category{{$index}}" class="post_edit_category">Category</label>
                        <div class="post_edit_center">
                        <select name="category{{$index}}" id="category" class="post_edit_label">
                            @foreach(Config::get('tag.tag_category') as $key => $val)
                                <option value="{{$post->category_id}}" class="">{{$val}}</option>
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