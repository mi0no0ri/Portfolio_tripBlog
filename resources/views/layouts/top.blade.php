@extends('layouts.toppage')

@section('content')
<div class="new_wrap new_hidden">
    <a href="" class="new_title">new post!!</a>
</div>

<img src="/storage/posts/{{$back->image}}" class="title_pic">
<div class="title">
    <h1 >My Journey</h1>
</div>

<div id="japan_map" data-aos="fade-up">
    <h2 class="top_title">Japan</h2>
    <div class="max_map map">
        <div id="hokkaido_tohoku">
            <a href="/gallery_list/{{1}}" class="hokkaido noneLink">
                <div>Hokkaido</div>
            </a>
            <a href="/gallery_list/{{2}}" class="tohoku noneLink">
                <div>Tohoku</div>
            </a>
            <a href="/gallery_list/{{3}}" class="kanto noneLink">
                <div>Kanto</div>
            </a>
        </div>
        <a href="/gallery_list/{{4}}" class="chubu noneLink">
            <div>Chubu</div>
        </a>
        <a href="/gallery_list/{{5}}" class="kansai noneLink">
            <div>Kansai</div>
        </a>
        <div id="chugoku_shikoku">
            <a href="/gallery_list/{{6}}" class="chugoku noneLink">
                <div>Chugoku</div>
            </a>
            <a href="/gallery_list/{{7}}" class="shikoku noneLink">
                <div>Shikoku</div>
            </a>
        </div>
        <div id="kyushu_okinawa">
            <a href="/gallery_list/{{8}}" class="kyushu noneLink">
                <div>Kyushu</div>
            </a>
            <a href="/gallery_list/{{9}}" class="okinawa noneLink">
                <div>Okinawa</div>
            </a>
        </div>
    </div>

    <div class="min_map map">
        <a href="/gallery_list/{{1}}" class="hokkaido noneLink">
            <div>Hokkaido</div>
        </a>
        <a href="/gallery_list/{{2}}" class="tohoku noneLink">
            <div>Tohoku</div>
        </a>
        <a href="/gallery_list/{{3}}" class="kanto noneLink">
            <div>Kanto</div>
        </a>
        <a href="/gallery_list/{{4}}" class="chubu noneLink">
            <div>Chubu</div>
        </a>
        <a href="/gallery_list/{{5}}" class="kansai noneLink">
            <div>Kansai</div>
        </a>
        <a href="/gallery_list/{{6}}" class="chugoku noneLink">
            <div>Chugoku</div>
        </a>
        <a href="/gallery_list/{{7}}" class="shikoku noneLink">
            <div>Shikoku</div>
        </a>
        <a href="/gallery_list/{{8}}" class="kyushu noneLink">
            <div>Kyushu</div>
        </a>
        <a href="/gallery_list/{{9}}" class="okinawa noneLink">
            <div>Okinawa</div>
        </a>
    </div>

</div>

<div id="world_map" data-aos="fade-up">
    <h2 class="top_title">World</h2>
    <div id="world" class="max_map">
        <div class="world_list">
            <div class="eu_asia">
                <div class="europe">
                    <a href="/gallery_list/{{10}}" id="europe" class="europe_map noneLink">
                        <div>Europe</div>
                    </a>
                    <a href="/gallery_list/{{10}}" id="europe2" class="europe_map noneLink">
                        <div></div>
                    </a>
                </div>
                <div class="asia">
                    <a href="/gallery_list/{{11}}" id="asia" class="asia_map noneLink">
                        <div>Asia</div>
                    </a>
                    <a href="/gallery_list/{{11}}" id="asia2" class="asia_map noneLink">
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
                <a href="/gallery_list/{{12}}" id="america" class="america_map noneLink">
                    <div>America/Canada</div>
                </a>
                <a href="/gallery_list/{{12}}" id="america2" class="america_map noneLink">
                    <div></div>
                </a>
            </div>
        </div>
        <div class="world_list">
            <div class="africa">
                <a href="/gallery_list/{{13}}" id="africa" class="africa_map noneLink">
                    <div>Africa</div>
                </a>
                <a href="/gallery_list/{{13}}" id="africa2" class="africa_map noneLink">
                    <div></div>
                </a>
            </div>
            <a href="/gallery_list/{{14}}" id="australia" class="australia_map noneLink">
                <div>Australia</div>
            </a>
            <div class="southAmerica">
                <a href="/gallery_list/{{15}}" id="southAmerica" class="south_map noneLink">
                    <div>South America</div>
                </a>
                <a href="/gallery_list/{{15}}" id="southAmerica2" class="south_map noneLink">
                    <div></div>
                </a>
            </div>
        </div>
    </div>

        <div class="min_map map">
            <a href="/gallery_list/{{10}}" id="europe" class="europe_map noneLink">
                <div>Europe</div>
            </a>
            <a href="/gallery_list/{{11}}" id="asia" class="asia_map noneLink">
                <div>Asia</div>
            </a>
            <a href="#japan_map" id="japan" class="japan_map">
                <div>Japan</div>
            </a>
            <a href="/gallery_list/{{12}}" id="america" class="america_map noneLink">
                <div>America, Canada</div>
            </a>
            <a href="/gallery_list/{{13}}" id="africa" class="africa_map noneLink">
                <div>Africa</div>
            </a>
            <a href="/gallery_list/{{14}}" id="australia" class="australia_map noneLink">
                <div>Australia</div>
            </a>
            <a href="/gallery_list/{{15}}" id="southAmerica" class="south_map noneLink">
                <div>South America</div>
            </a>
        </div>
</div>

<div id="category_map" data-aos="fade-up">
    <h2 class="top_title">Category</h2>
    <ul id="category">
        @foreach($categories as $index => $category)
            @foreach($cate_images as $cate_image)
                @if($cate_image->category_id == 0)
                @else
                    @if($cate_image->category_id == $category->category_id)
                    <a href="/category/{{$cate_image->category_id}}" class="category_list">
                        <li class="category_img">{{ config("tag.tag_category.$category->category_id") }}<br>
                            <img src="/storage/posts/{{$cate_image->image}}" alt="" class="pic">
                        </li>
                    </a>
                    @break
                    @endif
                @endif
            @endforeach
        @endforeach
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
            var array = @json($area);
            var result = $.grep(array,function(obj,index){
                if(obj.area_id == 1){
                    $(".hokkaido").removeClass("noneLink");
                } else if(obj.area_id == 2) {
                    $(".tohoku").removeClass("noneLink");
                } else if(obj.area_id == 3) {
                    $(".kanto").removeClass("noneLink");
                } else if(obj.area_id == 4) {
                    $(".chubu").removeClass("noneLink");
                } else if(obj.area_id == 5) {
                    $(".kansai").removeClass("noneLink");
                } else if(obj.area_id == 6) {
                    $(".chugoku").removeClass("noneLink");
                } else if(obj.area_id == 7) {
                    $(".shikoku").removeClass("noneLink");
                } else if(obj.area_id == 8) {
                    $(".kyushu").removeClass("noneLink");
                } else if(obj.area_id == 9) {
                    $(".okinawa").removeClass("noneLink");
                } else if(obj.area_id == 10) {
                    $(".europe_map").removeClass("noneLink");
                } else if(obj.area_id == 11) {
                    $(".asia_map").removeClass("noneLink");
                } else if(obj.area_id == 12) {
                    $(".america_map").removeClass("noneLink");
                } else if(obj.area_id == 13) {
                    $(".africa_map").removeClass("noneLink");
                } else if(obj.area_id == 14) {
                    $(".australia_map").removeClass("noneLink");
                } else if(obj.area_id == 15) {
                    $(".south_map").removeClass("noneLink");
                }
            })
        })
    </script>
    <script>
        $(function(){
            var info = @json($new);
            var label = $.grep(info,function(obj,index){
                if(obj.created_at !== null){
                    $(".new_wrap").removeClass("new_hidden");
                } else {
                    $(".new_wrap").addClass("new_hidden");
                }
            })
        })
    </script>
@endsection