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

// post
$('.img_file').on('change',function(){
    var file = $(this).prop('files')[0];
    var target = $(this).data('target');
    var image = document.getElementById(target);
    $(image).text(file.name);
});

// post insert
$(function(){
    var obj = $('.image_label');
    obj.on('dragover',function(e){
        e.stopPropagation;
        e.preventDefault;
        $(this).css('opacity','0.8');
    });
    obj.on('dragleave',function(e){
        e.stopPropagation;
        e.preventDefault;
        $(this).css('opacity','1.0');
    });
    obj.on('dragenter',function(e){
        e.stopPropagation;
        e.preventDefault;
        $(this).css('opacity','0.8');
    });
})

// japan_map scroll
$(function(){
    $('a[href^=#]').on('click',function(){
        var speed = 400;
        var href = $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        $('body,html').animate({scrollTop:position}, speed, 'swing');
        return false;
    });
});

// world_map
// europe
$(function(){
    $('.europe_map').on({'mouseenter':function(){
        var enter = {
            'background-color':'#7e7ef2',
            'transition':'0.2s'
        }
        $('.europe_map').css(enter);
    },
    'mouseleave':function(){
        var leave = {
            'background-color':'gray',
            'transition':'0.2s'
        }
        $('.europe_map').css(leave);
    }
    });
});
// asia
$(function(){
    $('.asia_map').on({'mouseenter':function(){
        var enter = {
            'background-color':'#3dc8ff',
            'transition':'0.2s'
        }
        $('.asia_map').css(enter);
    },
    'mouseleave':function(){
        var leave = {
            'background-color':'gray',
            'transition':'0.2s'
        }
        $('.asia_map').css(leave);
    }
    });
});
// japan
$(function(){
    $('.japan_map').on({'mouseenter':function(){
        var enter = {
            'background-color':'#575dff',
            'transition':'0.2s'
        }
        $('.japan_map').css(enter);
    },
    'mouseleave':function(){
        var leave = {
            'background-color':'gray',
            'transition':'0.2s'
        }
        $('.japan_map').css(leave);
    }
    });
});
// america/canada
$(function(){
    $('.america_map').on({'mouseenter':function(){
        var enter = {
            'background-color':'#ff504a',
            'transition':'0.2s'
        }
        $('.america_map').css(enter);
    },
    'mouseleave':function(){
        var leave = {
            'background-color':'gray',
            'transition':'0.2s'
        }
        $('.america_map').css(leave);
    }
    });
});
// africa
$(function(){
    $('.africa_map').on({'mouseenter':function(){
        var enter = {
            'background-color':'#00a300',
            'transition':'0.2s'
        }
        $('.africa_map').css(enter);
    },
    'mouseleave':function(){
        var leave = {
            'background-color':'gray',
            'transition':'0.2s'
        }
        $('.africa_map').css(leave);
    }
    });
});
// australia
$(function(){
    $('.australia_map').on({'mouseenter':function(){
        var enter = {
            'background-color':'#ffc46b',
            'transition':'0.2s'
        }
        $('.australia_map').css(enter);
    },
    'mouseleave':function(){
        var leave = {
            'background-color':'gray',
            'transition':'0.2s'
        }
        $('.australia_map').css(leave);
    }
    });
});
// southAmerica
$(function(){
    $('.south_map').on({'mouseenter':function(){
        var enter = {
            'background-color':'#ffb3b0',
            'transition':'0.2s'
        }
        $('.south_map').css(enter);
    },
    'mouseleave':function(){
        var leave = {
            'background-color':'gray',
            'transition':'0.2s'
        }
        $('.south_map').css(leave);
    }
    });
});

// profile_edit
$('.profile_image').on('change',function(){
    var file = $(this).prop('files')[0];
    var target = $(this).data('target');
    var image = document.getElementById(target);
    $(image).text(file.name);
});
