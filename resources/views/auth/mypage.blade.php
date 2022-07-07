@extends('auth.loginpage')

@section('content')
<h2 class="sub_title">My Page</h2>
<div>
    <div>
        <h3 class="mypage_title">Already visited in JAPAN</h3>
    </div>

    <div>
        <h3 class="mypage_title">Contact</h3>
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
                <td>{{ $contact->title }}</td>
                <td>{{ $contact->comment }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection