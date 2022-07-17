@extends('auth.loginpage')

@section('content')

<h2 class="sub_title">Contact Form</h2>
    <table class="mypage_contact">
        <tr class="contact_list">
            <th class="mypage_date">Date</th>
            <th class="mypage_sub_title">title</th>
            <th class="mypage_comment">Comment</th>
            <th class="mypage_name">name</th>
            <th class="mypage_email">email</th>
        </tr>

        @foreach ($forms as $form)
            <tr>
                <td>{{ $form->created_at }}</td>
                <td>{{ config('tag.tag_name.', $form->title) }}</td>
                <td>{{ $form->comment }}</td>
                <td>{{ $form->name }}</td>
                <td>{{ $form->email }}</td>
            </tr>
        @endforeach
    </table>
    <div class="mypage_links">
        {!! $forms->links() !!}
    </div>

@endsection