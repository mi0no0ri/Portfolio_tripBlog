@extends('auth.loginpage')

@section('content')
<div class="post_content">
    <h2>Post</h2>

    {!! Form::open(['url' => 'post/create','enctype' => 'multipart/form-data','method' => 'POST']) !!}
    {{ csrf_field() }}

        <div class="post_title">
            <div>
                {{ Form::label('dest','Destination') }}
                {{ Form::text('dest',null,['class' => 'dest','placeholder' => 'ex)Tokyo']) }}
            </div>
            <div>
                {{ Form::label('area','Area') }}
                {{ Form::select('area',['0' => '','1' => 'Hokkaido','2' => 'Tohoku','3' => 'Kanto','4' => 'Chubu','5' => 'Kansai','6' => 'Chugoku','7' => 'Shikoku','8' => 'Kyushu','9' => 'Okinawa'],0,['class' => 'area']) }}
            </div>
            <div>
                {{ Form::label('date','Date') }}
                {{ Form::text('date',null,['class' => 'date','placeholder' => 'DD/MMM/YY']) }}
            </div>
        </div>
        @for($i = 0; $i < 10; $i++)
            <div class="post_img">
                <div id="image_insert">
                    <label for="image{{$i}}" class="image_label">Icon Image</label>
                    <div class="image_post">
                        <input type="hidden" name="image" class="img_file">
                        <input type="file" name="image" class="img_file" id="image{{$i}}" data-target="post{{$i}}">
                    </div>
                </div>
                <div class="image_name" id="post{{$i}}">
                    <span>No select</span>
                </div>
                <div>
                    {{ Form::label('comment','Comment') }}
                    {{ Form::text('comment',null,['class' => 'comment']) }}
                </div>
                <div>
                    {{ Form::label('category','Category') }}
                    {{ Form::select('category',['0' => '','1' => 'Urban','2' => 'Nature','3' => 'Calture','4' => 'Food','5' => 'Others'],0,['class' => 'category']) }}
                </div>
            </div>
        @endfor
        {{ Form::submit('Post',['class' => 'post_btn']) }}

    {!! Form::close() !!}
</div>
@endsection