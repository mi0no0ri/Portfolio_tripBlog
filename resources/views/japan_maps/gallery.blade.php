@extends('layouts.toppage')

@section('content')

<h2 id="gallery_title" class="profile_title">Gallery</h2>
@foreach($posts as $post)
<p id="gallery_subtitle">{{ $post->dest }}</p>
<ul class="gallery">
    <h3>{{ $post->date }}</h3>
    <div class="gallery_list">
        @foreach($images as $index => $image)
        <li>
            <a href="" data-target="modal{{$index}}" class="modal_open">
                <img src="/storage/posts/{{$image->image}}" class="pic map_pic">
            </a>
        </li>
        @endforeach
    </div>
</ul>
@endforeach

@foreach($images as $index => $image)
<div id="modal{{$index}}" class="modal active{{$index}}">
    <span class="slide_btn prev"></span>
    <span class="slide_btn next"></span>
    <div class="modal_inner">
        <div class="modal_content modal_close">
            <img src="/storage/posts/{{$image->image}}" class="image">
            <p class="inner_title">{{$image->comment}}</p>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('slide')
<script>
    $(function(){
    function toggleChangeBtn(){
        var images = @json($images);
        $.each(images,function(index,val){
            var slideIndex = $('.modal').index($(".active" + index));
            $('.slide_btn').show();
            if (slideIndex == 0){
                $('.prev').hide();
                console.log(slideIndex);
            } else if (slideIndex == 9){
                $('.next').hide();
                console.log(slideIndex);
            }
        })
    }

    toggleChangeBtn();

    $('.next').on('click',function(){
        var $displaySlide = $('.active');
        console.log($displaySlide);
        $displaySlide.removeClass('active');
        $displaySlide.next().addClass('active');
        toggleChangeBtn();
    });
    $('.prev').on('click',function(){
        var $displaySlide = $('.active');
        console.log($displaySlide);
        $displaySlide.removeClass('active');
        $displaySlide.prev().addClass('active');
        toggleChangeBtn();
    });
});

</script>
@endsection