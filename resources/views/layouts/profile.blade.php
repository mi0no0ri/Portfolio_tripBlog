@extends('layouts.toppage')

@section('content')
<div class="profile">
    <h3 class="profile_title">Profile</h3>
    <div class="profile_content">
        <img src="/image/IMG_7295.jpg" class="profile_pic">
        <div class="profile_list">
            <small>Nishizawa Minori</small>
            <p>西澤 未乗</p>
            <p class="my_background">
                2019年に某大学の観光学部を卒業後、某航空会社に入社しグランドスタッフとして3年間働いていました。
                その後WEBデザイナーに転職し、今回WEBサイト作成の練習も兼ねて趣味の旅行を記録するためブログを始めました！
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