@extends('auth.loginpage')

@section('content')
<div class="post_content">
    <h2>Post</h2>

    {!! Form::open(['url' => 'post/create','enctype' => 'multipart/form-data','method' => 'POST']) !!}
    {{ csrf_field() }}

        <div class="post_title">
            <div class="post_list">
                {{ Form::label('dest','Destination') }}
                {{ Form::text('dest',null,['class' => 'dest','placeholder' => 'ex)Tokyo']) }}
                @foreach ($errors->get('dest') as $error)
                    <div>
                        <strong class="errors">{{ $error }}</strong>
                    </div>
                @endforeach
            </div>
            <div class="post_list">
                {{ Form::label('area','Area') }}
                {{ Form::select('area',['0' => '','1' => 'Hokkaido','2' => 'Tohoku','3' => 'Kanto','4' => 'Chubu','5' => 'Kansai','6' => 'Chugoku','7' => 'Shikoku','8' => 'Kyushu','9' => 'Okinawa'],0,['class' => 'area']) }}
                @foreach ($errors->get('area_id') as $error)
                    <div>
                        <strong class="errors">{{ $error }}</strong>
                    </div>
                @endforeach
            </div>
            <div class="post_list">
                {{ Form::label('date','Date') }}
                {{ Form::text('date',null,['class' => 'date','placeholder' => 'DD/MMM/YY']) }}
                @foreach ($errors->get('date') as $error)
                    <div>
                        <strong class="errors">{{ $error }}</strong>
                    </div>
                @endforeach
            </div>
        </div>
        @for($i = 1; $i <= 10; $i++)
            <div class="post_img">
                <div id="image_insert">
                    <label for="image{{$i}}" class="image_label">Icon Image</label>
                    <div class="image_post">
                        <input type="hidden" name="image" class="img_file">
                        <input type="file" name="image{{$i}}" class="img_file" id="image{{$i}}" data-target="post{{$i}}">
                        @foreach ($errors->get("image") as $error)
                            <div>
                                <strong class="errors">{{ $error }}</strong>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="image_name" id="post{{$i}}">
                    <span>No select</span>
                </div>
                <div>
                    <label for="comment{{$i}}" class="">Comment</label>
                    <input type="hidden" name="comment" class="">
                    <input type="text" name="comment{{$i}}" class="comment">
                    @foreach ($errors->get("comment") as $error)
                        <div>
                            <strong class="errors">{{ $error }}</strong>
                        </div>
                    @endforeach

                </div>
                <div>
                    <label for="category{{$i}}" class="">Category</label>
                    <select name="category{{$i}}" id="category">
                        @foreach(Config::get('tag.tag_category') as $key => $val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endfor
        {{ Form::submit('Post',['class' => 'post_btn']) }}

    {!! Form::close() !!}
</div>
@endsection