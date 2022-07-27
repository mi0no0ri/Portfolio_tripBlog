@extends('auth.loginpage')

@section('content')

<h2 class="sub_title">Contact Form</h2>
    <table class="mypage_contact">
        <tr class="contact_form_list">
            <div class="list_content">
                <th class="mypage_date">Date</th>
                <th class="mypage_sub_title">title</th>
            </div>
            <div class="list_content">
                <th class="mypage_comment">Comment</th>
                <th class="mypage_name">name</th>
                <th class="mypage_email">email</th>
            </div>
        </tr>
        <div class="contact_return">
        @foreach ($forms as $form)
            <tr class="contact_form_list">
                <div class="list_content">
                    <td>{{ $form->created_at }}</td>
                    <td>{{ config("tag.tag_name.$form->title") }}</td>
                </div>
                <div class="list_content">
                    <td>{{ $form->comment }}</td>
                    <td>{{ $form->name }}</td>
                    <td>{{ $form->email }}</td>
                </div>
            </tr>
        @endforeach
        </div>
    </table>
    <div class="mypage_links">
        {!! $forms->links() !!}
    </div>

@endsection