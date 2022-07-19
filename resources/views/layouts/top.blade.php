@extends('layouts.toppage')

@section('content')
<div class="new_wrap new_hidden">
    <a href="" class="new_title">new post!!</a>
</div>

<div class="title">
    <h1 >My Journey</h1>
</div>

<div id="japan_map" data-aos="fade-up">
    <h2 class="top_title">Japan</h2>
    <div id="map">
        <div id="hokkaido_tohoku">
            <a href="/gallery/{{1}}" id="hokkaido" class="noneLink">
                <div>Hokkaido</div>
            </a>
            <a href="/gallery/{{2}}" id="tohoku" class="noneLink">
                <div>Tohoku</div>
            </a>
            <a href="/gallery/{{3}}" id="kanto" class="noneLink">
                <div>Kanto</div>
            </a>
        </div>
        <a href="/gallery/{{4}}" id="chubu" class="noneLink">
            <div>Chubu</div>
        </a>
        <a href="/gallery/{{5}}" id="kansai" class="noneLink">
            <div>Kansai</div>
        </a>
        <div id="tyugoku_shikoku">
            <a href="/gallery/{{6}}" id="chugoku" class="noneLink">
                <div>Chugoku</div>
            </a>
            <a href="/gallery/{{7}}" id="shikoku" class="noneLink">
                <div>Shikoku</div>
            </a>
        </div>
        <div id="kyushu_okinawa">
            <a href="/gallery/{{8}}" id="kyushu" class="noneLink">
                <div>Kyushu</div>
            </a>
            <a href="/gallery/{{9}}" id="okinawa" class="noneLink">
                <div>Okinawa</div>
            </a>
        </div>
    </div>
</div>

<div id="world_map" data-aos="fade-up">
    <h2 class="top_title">World</h2>
    <div id="world">
        <div class="world_list">
            <div class="eu_asia">
                <div class="europe">
                    <a href="/gallery/{{10}}" id="europe" class="europe_map">
                        <div>Europe</div>
                    </a>
                    <a href="/gallery/{{10}}" id="europe2" class="europe_map">
                        <div></div>
                    </a>
                </div>
                <div class="asia">
                    <a href="/gallery/{{11}}" id="asia" class="asia_map">
                        <div>Asia</div>
                    </a>
                    <a href="/gallery/{{11}}" id="asia2" class="asia_map">
                        <div></div>
                    </a>
                </div>
            </div>
            <div class="japan">
                <a href="#japan_map" id="japan" class="japan_map">
                    <div>Japan</div>
                </a>
                <a href="#japan_map" id="japan2" class="japan_map">
                    <div></div>
                </a>
            </div>
            <div class="america">
                <a href="/gallery/{{12}}" id="america" class="america_map">
                    <div>America/Canada</div>
                </a>
                <a href="/gallery/{{12}}" id="america2" class="america_map">
                    <div></div>
                </a>
            </div>
        </div>
        <div class="world_list">
            <div class="africa">
                <a href="/gallery/{{13}}" id="africa" class="africa_map">
                    <div>Africa</div>
                </a>
                <a href="/gallery/{{13}}" id="africa2" class="africa_map">
                    <div></div>
                </a>
            </div>
            <a href="/gallery/{{14}}" id="australia" class="australia_map">
                <div>Australia</div>
            </a>
            <div class="southAmerica">
                <a href="/gallery/{{15}}" id="southAmerica" class="south_map">
                    <div>South America</div>
                </a>
                <a href="/gallery/{{15}}" id="southAmerica2" class="south_map">
                    <div></div>
                </a>
            </div>
        </div>
    </div>
</div>

<div id="category_map" data-aos="fade-up">
    <h2 class="top_title">Category</h2>
    <ul id="category">
        <a href="/category/{{1}}" class="category_list">
            <li class="category_img">Urban<br>
                <img src="/image/IMG_6938.JPG" alt="" class="pic">
            </li>
        </a>
        <a href="/category/{{2}}" class="category_list">
            <li class="category_img">Nature<br>
                <img src="/image/IMG_7185.jpg" alt="" class="pic">
            </li>
        </a>
        <a href="/category/{{3}}" class="category_list">
            <li class="category_img">Calture<br>
                <img src="/image/IMG_7877.JPG" alt="" class="pic">
            </li>
        </a>
        <a href="/category/{{4}}" class="category_list">
            <li class="category_img">Food<br>
                <img src="/image/IMG_7902.jpg" alt="" class="pic">
            </li>
        </a>
        <a href="/category/{{5}}" class="category_list">
            <li class="category_img">Others<br>
                <img src="/image/IMG_4145.JPG" alt="" class="pic">
            </li>
        </a>
    </ul>
</div>

<div>
    <div id="sns_link">
        <a href="https://twitter.com/_mi_no_ri_">
            <li><i class="fa-brands fa-twitter"></i></li>
        </a>
        <a href="https://www.instagram.com/_mi_no_ri_/">
            <li><i class="fa-brands fa-instagram"></i></li>
        </a>
        <a href="https://www.facebook.com/profile.php?id=100007798981525">
            <li><i class="fa-brands fa-facebook"></i></li>
        </a>
    </div>
</div>
@endsection

@section('layout')
<script>
        $(function(){
            var array = @json($pref);
            var result = $.grep(array,function(obj,index){
                if(obj.area_id == 1){
                    $("#hokkaido").removeClass("noneLink");
                } else if(obj.area_id == 2) {
                    $("#tohoku").removeClass("noneLink");
                } else if(obj.area_id == 3) {
                    $("#kanto").removeClass("noneLink");
                } else if(obj.area_id == 4) {
                    $("#chubu").removeClass("noneLink");
                } else if(obj.area_id == 5) {
                    $("#kansai").removeClass("noneLink");
                } else if(obj.area_id == 6) {
                    $("#chugoku").removeClass("noneLink");
                } else if(obj.area_id == 7) {
                    $("#shikoku").removeClass("noneLink");
                } else if(obj.area_id == 8) {
                    $("#kyushu").removeClass("noneLink");
                } else if(obj.area_id == 9) {
                    $("#okinawa").removeClass("noneLink");
                }
            })
        })
    </script>
@endsection