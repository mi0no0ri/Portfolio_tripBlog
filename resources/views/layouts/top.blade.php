@extends('layouts.toppage')

@section('content')
<div class="title">
    <h1 >My Journey</h1>
</div>

<div id="japan_map" data-aos="fade-up">
    <h2 class="">Japan</h2>
    <div id="map">
        <div id="hokkaido_tohoku">
            <a href="/gallery" id="hokkaido">
                <div>Hokkaido</div>
            </a>
            <a href="/gallery" id="tohoku">
                <div>Tohoku</div>
            </a>
            <a href="/gallery" id="kanto">
                <div>Kanto</div>
            </a>
        </div>
        <a href="/gallery" id="chubu">
            <div>Chubu</div>
        </a>
        <a href="/gallery" id="kansai">
            <div>Kansai</div>
        </a>
        <div id="tyugoku_shikoku">
            <a href="/gallery" id="chugoku">
                <div>Chugoku</div>
            </a>
            <a href="/gallery" id="shikoku">
                <div>Shikoku</div>
            </a>
        </div>
        <div id="kyushu_okinawa">
            <a href="/gallery" id="kyushu">
                <div>Kyushu</div>
            </a>
            <a href="/gallery" id="okinawa">
                <div>Okinawa</div>
            </a>
        </div>
    </div>
</div>

<div id="world_map" data-aos="fade-up">
    <h2>World</h2>
    <ul id="world">
        <a href="/gallery" class="world_list">
            <li class="world_img">Asia<br>
                <img src="/image/IMG_5594_Original.jpg" class="pic">
            </li>
        </a>
        <a href="/gallery" class="world_list">
            <li class="world_img">America/Canada<br>
                <img src="/image/PB120148のコピー.jpg" class="pic">
            </li>
        </a>
        <a href="/gallery" class="world_list">
            <li class="world_img">Austraria<br>
                <img src="" class="pic">
            </li>
        </a>
        <a href="/gallery" class="world_list">
            <li class="world_img">Europe<br>
                <img src="" class="pic">
            </li>
        </a>
        <a href="/gallery" class="world_list">
            <li class="world_img">Africa<br>
                <img src="" class="pic">
            </li>
        </a>
    </ul>
</div>

<div id="category_map" data-aos="fade-up">
    <h2>Category</h2>
    <ul id="category">
        <a href="" class="category_list">
            <li class="category_img">Urban<br>
                <img src="/image/IMG_6938.JPG" alt="" class="pic">
            </li>
        </a>
        <a href="" class="category_list">
            <li class="category_img">Nature<br>
                <img src="/image/IMG_7185.jpg" alt="" class="pic">
            </li>
        </a>
        <a href="" class="category_list">
            <li class="category_img">Calture<br>
                <img src="/image/IMG_7877.JPG" alt="" class="pic">
            </li>
        </a>
        <a href="" class="category_list">
            <li class="category_img">Food<br>
                <img src="/image/IMG_7902.jpg" alt="" class="pic">
            </li>
        </a>
        <a href="" class="category_list">
            <li class="category_img">Others<br>
                <img src="/image/IMG_4145.JPG" alt="" class="pic">
            </li>
        </a>
    </ul>
</div>

<div>
    <div id="sns_link">
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
@endsection