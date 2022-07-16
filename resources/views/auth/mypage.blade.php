@extends('auth.loginpage')

@section('content')
<h2 class="sub_title">My Page</h2>
<div>
    <div>
        <h3 class="mypage_title">Already visited in JAPAN is...</h3>
    </div>

    <div>
        <h3 class="mypage_title">The form you are sended is...</h3>
        <table class="mypage_contact">
            <tr class="contact_list">
                <th class="mypage_date">Date</th>
                <th class="mypage_sub_title">title</th>
                <th class="mypage_comment">Comment</th>
                <th class="mypage_name">name</th>
                <th class="mypage_email">email</th>
            </tr>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->created_at }}</td>
                <td>{{ config('tag.tag_name.', $contact->title) }}</td>
                <td>{{ $contact->comment }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
            </tr>
            @endforeach
        </table>
        <div class="mypage_links">
            {!! $contacts->links() !!}
        </div>
    </div>

    <div>
        <h3 class="mypage_title">Where i wanna go...</h3>
        {!! Form::open(['route' => ['search'],'method' => 'POST']) !!}
        {!! Form::hidden('id',Auth::id()) !!}
        {{csrf_field()}}
        <div class="todo_list mypage_contact">
            {{ Form::label('list','ToDo List',['class' => 'list_title']) }}
            <div class="list_bar">
                {{ Form::text('list',null,['class' => 'list_content','placeholder' => '世界一周したい!']) }}
                {{Form::submit('追加する',['class'=>''])}}
                @foreach ($errors->get("list") as $error)
                    <div>
                        <strong>{{ $error }}</strong>
                    </div>
                @endforeach
            </div>
        </div>
        {!! Form::close() !!}
        <div class="mypage_links">
            {!! $lists->links() !!}
        </div>
    </div>
</div>

@endsection