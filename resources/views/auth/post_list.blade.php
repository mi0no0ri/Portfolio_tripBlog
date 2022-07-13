@extends('auth.loginpage')

@section('content')
<div class="sub_title">
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
    @foreach($posts as $post)
    <tr>
        <td>{{ $post->date }}</td>
        <td>{{ $post->dest }}</td>
        <td>{{ $post->comment }}</td>
        <td><a href="/post_edit/{{$post->id}}" class="post_btn"><button><i class="fa-solid fa-pen-to-square"></i></button></a></td>
        <td><a href="/post/delete/{{$post->id}}" class="post_btn" onclick="return confirm('投稿を削除しますか')"><button><i class="fa-solid fa-eraser"></i></button></a></td>
    </tr>
    @endforeach
</table>
@endsection