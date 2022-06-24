@extends('layouts.toppage')

@section('content')

<h2 id="gallery_title">Gallery</h2>
<p id="gallery_subtitle">Hokkaido</p>

<ul class="gallery">
    <h3>29NOV18</h3>
    <div class="gallery_list">
        <li>
            <a href="" data-target="modal1" class="modal_open">
                <img src="/image/DSC02649_Original.jpg" class="pic map_pic">
            </a>
        </li>
        <li>
            <a href="" data-target="modal2" class="modal_open">
                <img src="/image/DSC02655_Original.jpg" class="pic map_pic">
            </a>
        </li>
        <li>
            <a href="" data-target="modal3" class="modal_open">
                <img src="/image/DSC02663_Original.jpg" class="pic map_pic">
            </a>
        </li>
        <li>
            <a href="" data-target="modal4" class="modal_open">
                <img src="/image/DSC02709_Original.jpg" class="pic map_pic">
            </a>
        </li>
        <li>
            <a href="" data-target="modal5" class="modal_open">
                <img src="/image/DSC02744_Original.jpg" class="pic map_pic">
            </a>
        </li>
        <li>
            <a href="" data-target="modal6" class="modal_open">
                <img src="/image/DSC02769_Original.jpg" class="pic map_pic">
            </a>
        </li>
        <li>
            <a href="" data-target="modal7" class="modal_open">
                <img src="/image/DSC02789_Original.jpg" class="pic map_pic">
            </a>
        </li>
        <li>
            <a href="" data-target="modal8" class="modal_open">
                <img src="/image/DSC02802_Original.jpg" class="pic map_pic">
            </a>
        </li>
        <li>
            <a href="" data-target="modal9" class="modal_open">
                <img src="/image/DSC02819_Original.jpg" class="pic map_pic">
            </a>
        </li>
        <li>
            <a href="" data-target="modal10" class="modal_open">
                <img src="/image/IMG_1826_Original.jpg" class="pic map_pic">
            </a>
        </li>
    </div>

    <div id="modal1" class="modal">
        <span class="slide_btn prev"></span>
        <span class="slide_btn next"></span>
        <div class="modal_inner">
            <div class="modal_content modal_close">
                <img src="/image/DSC02649_Original.jpg" class="image">
                <p class="inner_title">札幌市内</p>
            </div>
        </div>
    </div>
    <div id="modal2" class="modal">
        <span class="slide_btn prev"></span>
        <span class="slide_btn next"></span>
        <div class="modal_inner">
            <div class="modal_content modal_close">
                <img src="/image/DSC02655_Original.jpg" class="image">
                <p class="inner_title">ドイツ祭り@札幌</p>
            </div>
        </div>
    </div>
    <div id="modal3" class="modal">
        <span class="slide_btn prev"></span>
        <span class="slide_btn next"></span>
        <div class="modal_inner">
            <div class="modal_content modal_close">
                <img src="/image/DSC02663_Original.jpg" class="image">
                <p class="inner_title">ドイツの郷土料理とビール@札幌</p>
            </div>
        </div>
    </div>
    <div id="modal4" class="modal">
        <span class="slide_btn prev"></span>
        <span class="slide_btn next"></span>
        <div class="modal_inner">
            <div class="modal_content modal_close">
                <img src="/image/DSC02709_Original.jpg" class="image">
                <p class="inner_title">海鮮丼@小樽</p>
            </div>
        </div>
    </div>
    <div id="modal5" class="modal">
        <span class="slide_btn prev"></span>
        <span class="slide_btn next"></span>
        <div class="modal_inner">
            <div class="modal_content modal_close">
                <img src="/image/DSC02744_Original.jpg" class="image">
                <p class="inner_title">ビール工場@小樽</p>
            </div>
        </div>
    </div>
    <div id="modal6" class="modal">
        <span class="slide_btn prev"></span>
        <span class="slide_btn next"></span>
        <div class="modal_inner">
            <div class="modal_content modal_close">
                <img src="/image/DSC02769_Original.jpg" class="image">
                <p class="inner_title">小樽運河</p>
            </div>
        </div>
    </div>
    <div id="modal7" class="modal">
        <span class="slide_btn prev"></span>
        <span class="slide_btn next"></span>
        <div class="modal_inner">
            <div class="modal_content modal_close">
                <img src="/image/DSC02789_Original.jpg" class="image">
                <p class="inner_title">クラーク博士像@札幌</p>
            </div>
        </div>
    </div>
    <div id="modal8" class="modal">
        <span class="slide_btn prev"></span>
        <span class="slide_btn next"></span>
        <div class="modal_inner">
            <div class="modal_content modal_close">
                <img src="/image/DSC02802_Original.jpg" class="image">
                <p class="inner_title">支笏湖</p>
            </div>
        </div>
    </div>
    <div id="modal9" class="modal">
        <span class="slide_btn prev"></span>
        <span class="slide_btn next"></span>
        <div class="modal_inner">
            <div class="modal_content modal_close">
                <img src="/image/DSC02819_Original.jpg" class="image">
                <p class="inner_title">支笏湖周辺</p>
            </div>
        </div>
    </div>
    <div id="modal10" class="modal">
        <span class="slide_btn prev"></span>
        <span class="slide_btn next"></span>
        <div class="modal_inner">
            <div class="modal_content modal_close">
                <img src="/image/IMG_1826_Original.jpg" class="image">
                <p class="inner_title">トリトン@札幌駅周辺</p>
            </div>
        </div>
    </div>
</ul>

@endsection