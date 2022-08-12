@extends('auth.loginpage')

@section('content')
<div class="sub_title profile_edit_title">
    <h2>Profile Edit</h2>
</div>

<div class="profile_edit">
    {!! Form::open(['route' => ['profile_edit'],'method' => 'PUT','enctype' => 'multipart/form-data']) !!}
    {!! Form::hidden('id',$auth->id) !!}
    {{csrf_field()}}

    <div class="form_content">
        {{ Form::label('kana','Kana',['class' => 'profile_edit_tag required']) }}
        {{ Form::text('kana',$auth->kana,['class'=>'form_controls']) }}
        @foreach ($errors->get("kana") as $error)
            <div>
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    </div>

    <div class="form_content">
        {{ Form::label('username','Username',['class' => 'profile_edit_tag required']) }}
        {{ Form::text('username',$auth->username,['class'=>'form_controls']) }}
        @foreach ($errors->get("username") as $error)
            <div>
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    </div>

    <div class="form_content">
        {{ Form::label('email','Email',['class' => 'profile_edit_tag required']) }}
        {{ Form::text('email',$auth->email,['class'=>'form_controls']) }}
        @foreach ($errors->get("email") as $error)
            <div>
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    </div>

    <div class="form_content">
        {{ Form::label('password','New Password',['class' => 'profile_edit_tag']) }}
        {{ Form::password('password',['class'=>'form_controls','value'=>encrypt($auth->password)]) }}
        @foreach ($errors->get("password") as $error)
            <div>
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    </div>

    <div class="form_content">
        {{ Form::label('bio','Bio',['class' => 'profile_edit_tag required']) }}
        {{ Form::textarea('bio',$auth->bio,['class' => 'profile_bio']) }}
        @foreach ($errors->get("bio") as $error)
            <div>
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    </div>

    <div class="form_content">
        <label for="" class="profile_edit_tag">Image</label>
        <div class="profile_img">
            <label for="image" class="image_label">Image Select</label>
            <div class="image_input">
                <input type="hidden" name="image" class="img_file">
                <input type="file" name="image" class="img_file form_controls" value="{{$auth->image}}" data-target="profile_image" id="image">
            </div>
            <div class="image_name" id="profile_image">
                <span>No select</span>
            </div>
        </div>
    </div>

    <div class="form_content">
        <label for="" class="profile_edit_tag">Background</label>
        <div class="profile_img">
            <label for="backImg" class="image_label">Image Select</label>
            <div class="image_input">
                <input type="hidden" name="back_image" class="img_file">
                <input type="file" name="back_image" class="img_file form_controls" value="{{$auth->back_image}}" data-target="back_image" id="backImg">
            </div>
            <div class="image_name" id="back_image">
                <span>No select</span>
            </div>
        </div>
    </div>

    <div class="send">
        {{Form::submit('Edit',['class'=>'send_btn'])}}
    </div>
</div>

{!! Form::close() !!}

<div class="image_ex">
    <div class="profile_edit_img">
        <p>profile Imgae</p>
        @if($auth->image == null)
            <i class="fa-solid fa-user fa-8x"></i>
        @else
            <img src="/storage/images/{{ $auth->image }}" class="profile_edit_pic">
        @endif
    </div>
</div>

<div class="backImg_ex image_ex">
    <div class="profile_edit_img">
        <p>Profile Background</p>
        @if($auth->back_image == null)
            <i class="fa-solid fa-image"></i>
        @else
            <img src="/storage/images/{{ $auth->back_image }}" class="profile_edit_pic profile_edit_background">
        @endif
    </div>
</div>

@endsection