@extends('layouts.toppage')

@section('content')
<div class="profile" style="background-image: url('/storage/images/{{ $profiles->back_image }}')">
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

@endsection