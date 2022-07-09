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
                {{ Form::label('area','Area') }}
                {{ Form::select('area',['0' => '','1' => 'Hokkaido','2' => 'Tohoku','3' => 'Kanto','4' => 'Chubu','5' => 'Kansai','6' => 'Chugoku','7' => 'Shikoku','8' => 'Kyushu','9' => 'Okinawa'],"$up_post->area_id",['class' => 'area']) }}
            </div>
            <div>
                {{ Form::label('date','Date') }}
                {{ Form::text('date',"$up_post->date",['class' => 'date','placeholder' => 'DD/MMM/YY']) }}
            </div>
        </div>
        <div class="post_edit_img">
            @for($i = 1; $i <= 10; $i++)
                <div class="post_edit_content">
                    <div id="image_insert" class="">
                        <label for="image{{$i}}" class="">IconImage</label>
                        <div class="image_post">
                            <input type="hidden" name="image{{$i}}" class="img_file">
                            <input type="file" name="image{{$i}}" class="img_file" id="image{{$i}}" data-target="post{{$i}}">
                        </div>
                    </div>
                    <div class="" id="post{{$i}}">
                        <span>No select</span>
                    </div>
                    <div class="post_edit_comment">
                        <label for="comment{{$i}}" class="">Comment</label>
                        <input type="text" name="comment{{$i}}" class="">
                    </div>
                    <div class="post_edit_category">
                        <label for="category{{$i}}" class="">Category</label>
                        <select name="category{{$i}}" id="category">
                            @foreach(Config::get('tag.tag_category') as $key => $val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endfor
        </div>
        {{ Form::submit('Post',['class' => 'post_btn']) }}


        {!! Form::close() !!}
    </div>
</div>

@endsection