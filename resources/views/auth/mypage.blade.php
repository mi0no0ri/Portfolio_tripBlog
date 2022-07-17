@extends('auth.loginpage')

@section('content')
<h2 class="sub_title">My Page</h2>
<div class="">
    <div>
        <h3 class="mypage_title">Already visited in JAPAN is...</h3>
        <div>
            @for($i = 1; $i <= 47; $i++)
                <p>{{$i}}</p>
            @endfor
        </div>
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
            <a href="/contactForm">詳しく見る...</a>
        </div>
    </div>

    <div class="">
        <h3 class="mypage_title">Where i wanna go...</h3>
        <div class="todo">
            {!! Form::open(['route' => ['todo'],'method' => 'POST']) !!}
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
            <div class="todo">
                <table>
                    <tr class="todo_show">
                        <th class="todo_show_list">ToDo List</th>
                        <th class="">Check Box</th>
                    </tr>
                    @foreach($todo as $list)
                    <tr class="todo_show">
                        <td class="todo_show_list">・{{ $list->list }}</td>
                        <td>
                            <a href="mypage/{{$list->id}}" onclick="return confirm('todoを更新します。')">
                                <i class="fa-solid fa-square-check"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="mypage_links">
                {!! $todo->links() !!}
            </div>
        </div>
    </div>
</div>

@endsection