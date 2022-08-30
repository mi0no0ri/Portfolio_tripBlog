@extends('layouts.toppage')

@section('content')
<h2 id="gallery_title" class="profile_title">Search</h2>
<div class="gallery_wrap">
    @foreach($results as $result)
        <div class="gallery_contents">
            <a href="/profile/{{$result->user_id}}" class="gallery_link"></a>
                @if($result->image == null)
                    <a href="/profile/{{$result->user_id}}" class="gallery_image_link"><i class="fa-solid fa-user fa-8x fa_gallery"></i></a>
                @else
                    <a href="/profile/{{$result->user_id}}" class="gallery_image_link"><img src="/image/{{$result->image}}" class="gallery_image"></a>
                @endif
                <table>
                <tr class="gallery_section">
                    <td class="">Name：{{$result->username}}</td>
                    <td class="">Post：{{$count_post}}</td>
                    <td class="">Kana：{{$result->kana}}</td>
                </tr>
                </table>
        </div>
    @endforeach
</div>
@endsection