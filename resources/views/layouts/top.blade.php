@extends('layouts.toppage')

@section('content')
<div class="title">
    <h1 >My Journey</h1>
</div>

<div id="japan_map" data-aos="fade-up">
    <h2 class="top_title">Japan</h2>
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
    <h2 class="top_title">World</h2>
    <div id="world">
        <div class="world_list">
            <div class="eu_asia">
                <div class="europe">
                    <a href="/gallery" id="europe" class="europe_map">
                        <div>Europe</div>
                    </a>
                    <a href="/gallery" id="europe2" class="europe_map">
                        <div></div>
                    </a>
                </div>
                <div class="asia">
                    <a href="/gallery" id="asia" class="asia_map">
                        <div>Asia</div>
                    </a>
                    <a href="/gallery" id="asia2" class="asia_map">
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
                <a href="/gallery" id="america" class="america_map">
                    <div>America/Canada</div>
                </a>
                <a href="/gallery" id="america2" class="america_map">
                    <div></div>
                </a>
            </div>
        </div>
        <div class="world_list">
            <div class="africa">
                <a href="/gallery" id="africa" class="africa_map">
                    <div>Africa</div>
                </a>
                <a href="/gallery" id="africa2" class="africa_map">
                    <div></div>
                </a>
            </div>
            <a href="/gallery" id="australia" class="australia_map">
                <div>Australia</div>
            </a>
            <div class="southAmerica">
                <a href="/gallery" id="southAmerica" class="south_map">
                    <div>South America</div>
                </a>
                <a href="/gallery" id="southAmerica2" class="south_map">
                    <div></div>
                </a>
            </div>
        </div>
    </div>
</div>

<div id="category_map" data-aos="fade-up">
    <h2 class="top_title">Category</h2>
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