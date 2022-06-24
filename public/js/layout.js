'use strict';

// modal
$(function(){
	$('.modal_open').each(function(){
        $(this).on('click',function(){
		var target = $(this).data('target');
		var modal = document.getElementById(target);
		$(modal).fadeIn(500);
        $(modal).addClass("active");
		return false;
	});
    $(".modal_close").on("click",function(){
        $(".modal").fadeOut(500);
        $(".modal").removeClass("active");
    })
});
});

// animation
AOS.init();

// slide

$(function(){
    function toggleChangeBtn(){
        var slideIndex = $('.modal').index($('.active'));
        $('.slide_btn').show();
        if (slideIndex == 0){
            $('.prev').hide();
        } else if (slideIndex == 9){
            $('.next').hide();
        }
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
        $displaySlide.removeClass('active');
        $displaySlide.prev().addClass('active');
        toggleChangeBtn();
    });
});