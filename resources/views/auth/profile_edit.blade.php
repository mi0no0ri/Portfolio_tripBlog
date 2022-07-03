@extends('auth.loginpage')

@section('content')
<div class="edit_title">
    <h2>Profile Edit</h2>
</div>

<div class="profile_edit">
    {!! Form::open(['route' => ['profile_edit'],'method' => 'PUT','enctype' => 'multipart/form-data']) !!}
    {!! Form::hidden('id',$auth->id) !!}
    {{csrf_field()}}

    <div class="form_content">
        {{ Form::label('kana','Kana',['class' => 'profile_edit_tag']) }}
        {{ Form::text('kana',$auth->kana,['class'=>'form_controls']) }}
    </div>

    <div class="form_content">
        {{ Form::label('username','Username',['class' => 'profile_edit_tag']) }}
        {{ Form::text('username',$auth->username,['class'=>'form_controls']) }}
    </div>

    <div class="form_content">
        {{ Form::label('email','Email',['class' => 'profile_edit_tag']) }}
        {{ Form::text('email',$auth->email,['class'=>'form_controls']) }}
    </div>

    <div class="form_content">
        {{ Form::label('password','New Password',['class' => 'profile_edit_tag']) }}
        {{ Form::password('password',['class'=>'form_controls','value'=>encrypt($auth->password)]) }}
    </div>

    <div class="form_content">
        {{ Form::label('bio','Bio',['class' => 'profile_edit_tag']) }}
        {{ Form::text('bio',$auth->bio,['class' => 'profile_bio']) }}
    </div>

    <div class="form_content">
        {{ Form::label('image','Image',['class' => 'profile_edit_tag']) }}
        {{ Form::file('image',['class'=>'form_controls','value'=>$auth->image]) }}
    </div>

    <div class="send">
        {{Form::submit('更新する',['class'=>'send_btn'])}}
    </div>
</div>

{!! Form::close() !!}

@endsection