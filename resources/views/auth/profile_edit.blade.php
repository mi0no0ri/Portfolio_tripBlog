@extends('auth.loginpage')

@section('content')
<div class="edit_title">
    <h2>Profile Edit</h2>
</div>

<div class="profile_edit">
    {!! Form::open(['route' => ['profile_edit'],'method' => 'PUT','enctype' => 'multipart/form-data']) !!}
    {!! Form::hidden('id',$auth->id) !!}
    {{csrf_field()}}

    {{ Form::label('kana','Kana') }}
    {{ Form::text('kana',$auth->kana,['class'=>'form_controls']) }}

    {{ Form::label('username','Username') }}
    {{ Form::text('username',$auth->username,['class'=>'form_controls']) }}

    {{ Form::label('email','Email') }}
    {{ Form::text('email',$auth->email,['class'=>'form_controls']) }}

    {{ Form::label('password','New Password') }}
    {{ Form::password('password',['class'=>'form_controls','value'=>encrypt($auth->password)]) }}

    {{ Form::label('bio','Bio') }}
    {{ Form::text('bio',$auth->bio,['class'=>'form_controls']) }}

    {{ Form::label('image','Image') }}
    {{ Form::file('image',['class'=>'form_controls','value'=>$auth->image]) }}

    {{Form::submit('更新する',['class'=>'btn btn-success'])}}
</div>

{!! Form::close() !!}

@endsection