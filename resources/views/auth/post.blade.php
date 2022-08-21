@extends('auth.loginpage')

@section('content')
<div class="post_content">
    <h2>Post</h2>

    {!! Form::open(['url' => 'post/create','enctype' => 'multipart/form-data','method' => 'POST']) !!}
    {{ csrf_field() }}

        <div class="post_title">
            <div class="post_list">
                {{ Form::label('dest','Destination',['class' => 'required']) }}
                {{ Form::text('dest',null,['class' => 'dest','placeholder' => 'ex)Tokyo']) }}
                @foreach ($errors->get('dest') as $error)
                    <div>
                        <strong class="errors">{{ $error }}</strong>
                    </div>
                @endforeach
            </div>
            <div class="post_list">
                {{ Form::label('area','Area') }}
                {{ Form::select('area',config('tag.tag_area'),0,['class' => 'area','id' => 'area']) }}
                @foreach ($errors->get('area_id') as $error)
                    <div>
                        <strong class="errors">{{ $error }}</strong>
                    </div>
                @endforeach
            </div>
            <div class="post_list">
                {{ Form::label('pref','Prefecture') }}
                {{ Form::select('pref',config('tag.tag_pref'),0,['class' => 'pref','id' => 'pref']) }}
                @foreach ($errors->get('pref') as $error)
                    <div>
                        <strong class="errors">{{ $error }}</strong>
                    </div>
                @endforeach
            </div>
            <div class="post_list">
                {{ Form::label('date','Date',['class' => 'required']) }}
                {{ Form::text('date',null,['class' => 'date','placeholder' => 'DD/MMM/YY']) }}
                @foreach ($errors->get('date') as $error)
                    <div>
                        <strong class="errors">{{ $error }}</strong>
                    </div>
                @endforeach
            </div>
            <div class="post_caution">
                <small>※画像は1枚3MB,トータル30MBまでアップロードできます。<br></small>
                <small>※画像の拡張子はJPEG,PNG,BMPでアップロードしてください。</small>
            </div>
            <div>
                <a href="https://www.iloveimg.com/ja/compress-image" class="transform">・画像圧縮はこちら（外部リンク）<br></a>
                <a href="https://www.iloveimg.com/ja/convert-to-jpg" class="transform">・拡張子変更はこちら（外部リンク）</a>
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

<script>

</script>

@endsection
