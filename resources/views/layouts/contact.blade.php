@extends('layouts.toppage')

@section('content')
<div>
    <h3 class="profile_title">Contact</h3>
    <div class="contact_content">
        {!! Form::open(['url' => 'contact','method' => 'POST']) !!}
        {{ csrf_field() }}

        <div class="form_content">
            {{ Form::label('title','Title',['class' => 'title_label']) }}
            {{ Form::select('title',['0' => '','1' => '要望'],0,['class' => 'contact_title']) }}
        </div>

        <div class="form_content">
            {{ Form::label('name','Name',['class' => 'title_label']) }}
            {{ Form::text('name',null,['class' => 'contact_title']) }}
        </div>

        <div class="form_content">
            {{ Form::label('email','Email',['class' => 'title_label']) }}
            {{ Form::text('email',null,['class' => 'contact_title']) }}
        </div>

        <div class="form_content">
            {{ Form::label('comment','Comment',['class' => 'comment_label']) }}
            {{ Form::text('comment',null,['class' => 'contact_comment']) }}
        </div>

        <div class="send">
            {{ Form::submit('Send',['class' => 'send_btn']) }}
        </div>

        {!! Form::close() !!}
    </div>
    <div class="contact_sns">
        <a class="twitter-timeline profile_sns" data-height="315" href="https://twitter.com/_mi_no_ri_?ref_src=twsrc%5Etfw">Tweets by _mi_no_ri_</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        <a class="twitter-timeline profile_sns" data-height="315" href="https://twitter.com/_mi_no_ri_?ref_src=twsrc%5Etfw">Tweets by _mi_no_ri_</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        <a class="twitter-timeline profile_sns" data-height="315" href="https://twitter.com/_mi_no_ri_?ref_src=twsrc%5Etfw">Tweets by _mi_no_ri_</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
</div>
@endsection