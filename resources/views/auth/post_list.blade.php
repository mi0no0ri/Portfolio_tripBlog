@extends('auth.loginpage')

@section('content')
<div class="edit_title">
    <h2 class="">Post edit</h2>
    <a href="{{ route('post') }}" class="post">投稿</a>
</div>

<table class="profile_edit">
    <tr>
        <th class="profile_date">Date</th>
        <th class="profile_dest">Dest</th>
        <th class="profile_comment">Comment</th>
        <th class="profile_btn"></th>
        <th class="profile_btn"></th>
    </tr>
    <tr>
        <td>29Nov18</td>
        <td>Hokkaido</td>
        <td>札幌市内</td>
        <td><a href="{{ route('post_edit') }}" class="post_btn"><button><i class="fa-solid fa-pen-to-square"></i></button></a></td>
        <td><a href="" class="post_btn"><button><i class="fa-solid fa-eraser"></i></button></a></td>
    </tr>
</table>
@endsection