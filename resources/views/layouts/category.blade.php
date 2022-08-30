@extends('layouts.toppage')

@section('content')
<div class="category_page">
    <h3>{{ $cateTitle }}</h3>
    <div class="category_wrap">
        @foreach($categories as $index => $category)
            <li>
                <a href="" data-target="modal{{$index}}" class="modal_open">
                    <img src="/storage/posts/{{$category->image}}" class="pic map_pic">
                </a>
            </li>
        @endforeach
    </div>

    @foreach($categories as $index => $val)
    <div id="modal{{$index}}" class="modal">
        <span class="slide_btn prev"></span>
        <span class="slide_btn next"></span>
        <div class="modal_inner">
            <div class="modal_content modal_close">
                <img src="/storage/posts/{{$val->image}}" class="image">
                <div class="modal_image_info">
                    <a href="/profile/{{$val->user_id}}" class="category_username">User：{{$val->username}}</a>
                    <p class="inner_title">Title：{{$val->comment}}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>
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