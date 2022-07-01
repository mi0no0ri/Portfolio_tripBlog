@extends('auth.loginpage')

@section('content')
<div class="edit_title">
    <h2 class="">Post List</h2>
    <a href="{{ route('post') }}" class="post">投稿</a>
</div>

<table class="post_edit">
    <tr>
        <th class="post_date">Date</th>
        <th class="post_dest">Dest</th>
        <th class="post_comment">Comment</th>
        <th class="post_list_btn"></th>
        <th class="post_list_btn"></th>
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