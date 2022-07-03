@extends('layouts.toppage')

@section('content')
<div>
    <h3 class="profile_title">Contact</h3>
    <div class="contact_content">
        {!! Form::open(['url' => 'contact','method' => 'POST']) !!}
        {{ csrf_field() }}

        <div class="form_content">
            {{ Form::label('title','Title',['class' => 'title_label']) }}
            {{ Form::text('title',null,['class' => 'contact_title']) }}
        </div>

        <div class="form_content">
            {{ Form::label('message','Message',['class' => 'message_label']) }}
            {{ Form::text('message',null,['class' => 'contact_message']) }}
        </div>

        <div class="send">
            {{ Form::submit('Send',['class' => 'send_btn']) }}
        </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection