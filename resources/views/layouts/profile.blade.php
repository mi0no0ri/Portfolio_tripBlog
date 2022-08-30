@extends('layouts.toppage')

@section('content')

<img src="/storage/images/{{ $profiles->back_image }}" class="profile">
<div class="profile_info">
    <h3 class="profile_title">Profile</h3>
    <div class="profile_content">
        @if($profiles->image == null)
            <i class="fa-solid fa-user fa-8x"></i>
        @else
            <img src="/storage/images/{{ $profiles->image }}" class="profile_pic">
        @endif
        <div class="profile_list">
            <small>{{ $profiles->kana }}</small>
            <p>{{ $profiles->username }}</p>
            <p class="my_background">
                {{ $profiles->bio }}
            </p>
        </div>
    </div>
    <div>
        <div id="sns_link" class="profile_sns">
            <a href="">
                <li><i class="fa-brands fa-twitter"></i></li>
            </a>
            <a href="">
                <li><i class="fa-brands fa-instagram"></i></li>
            </a>
            <a href="">
                <li><i class="fa-brands fa-facebook"></i></li>
            </a>
        </div>
    </div>
</div>

@if(!(isset($posts)))
@else
    <div class="profile_gallery">
    <h2 id="gallery_title" class="profile_title">Photos</h2>
    @foreach($posts as $post)
        <p id="gallery_subtitle">{{ $post->dest }}</p>
        <ul class="gallery">
            <h3>{{ $post->date }}</h3>
            <div class="gallery_list">
                @foreach($images as $index => $val)
                @if($post->dest == $val->dest&&$post->date == $val->date)
                <li>
                    <img src="/storage/posts/{{$val->image}}" class="pic map_pic">
                </li>
                @endif
                @endforeach
            </div>
        </ul>
    @endforeach
    </div>
@endif
</div>

@endsection