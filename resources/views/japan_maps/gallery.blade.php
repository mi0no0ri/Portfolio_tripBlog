@extends('layouts.toppage')

@section('content')

<h2 id="gallery_title" class="profile_title">Gallery</h2>
    @foreach($posts as $post)
    <p id="gallery_subtitle">{{ $post->dest }}</p>
    <ul class="gallery">
        <h3>{{ $post->date }}</h3>
        <div class="gallery_list">
            @foreach($images as $index => $val)
            @if($post->dest == $val->dest)
            <li>
                <a href="" data-target="modal{{$index}}" class="modal_open">
                    <img src="/storage/posts/{{$val->image}}" class="pic map_pic">
                </a>
            </li>
            @endif
            @endforeach
        </div>
    </ul>
    @endforeach

    @foreach($images as $index => $val)
    <div id="modal{{$index}}" class="modal">
        <span class="slide_btn prev"></span>
        <span class="slide_btn next"></span>
        <div class="modal_inner">
            <div class="modal_content modal_close">
                <img src="/storage/posts/{{$val->image}}" class="image">
                <p class="inner_title">{{$val->comment}}</p>
            </div>
        </div>
    </div>
    @endforeach

@endsection

@section('slide')
<script>
    function toggleChangeBtn() {
        var active = $(".active");
        var slideIndex = $('.modal').index(active);
        var max = $('.modal').length;

        $('.slide_btn').show();
        if (slideIndex == 0) {
            $('.prev').hide();
        } else if (slideIndex == max-1) {
            $('.next').hide();
        }

        return;
    }
    $(function() {
        $('.modal_open').each(function() {
            $(this).on('click', function() {
                var target = $(this).data('target');
                var modal = document.getElementById(target);
                $(modal).fadeIn(500);
                $(modal).addClass("active");

                toggleChangeBtn();

                return false;
            });
            $(".modal_close").on("click", function() {
                $(".modal").fadeOut(500);
                $(".modal").removeClass("active");
            })
        });
    });

    $(function() {
        $('.next').on('click', function() {
            var $displaySlide = $('.active');
            $displaySlide.removeClass('active');
            $displaySlide.css('display', 'none');
            $displaySlide.next().css('display', 'flex');
            $displaySlide.next().addClass('active');
            toggleChangeBtn();
        });
        $('.prev').on('click', function() {
            var $displaySlide = $('.active');
            $displaySlide.removeClass('active');
            $displaySlide.css('display', 'none');
            $displaySlide.prev().css('display', 'flex');
            $displaySlide.prev().addClass('active');
            toggleChangeBtn();
        });
    })
</script>
@endsection