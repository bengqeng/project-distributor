import masonry from 'masonry-layout/masonry';

$(window).on("scroll", function () {
    if ($(window).scrollTop() > 50) {
        $(".navbar").addClass("shadow-lg");
    } else {
        $(".navbar").removeClass("shadow-lg");
    }
});

// masonry
// var Masonry = require('masonry-layout');

var msnry = new masonry('.grid', {
    itemSelector: '.grid-item',
    isAnimated: true,
    animationOptions: {
        duration: 750,
        // easing: 'linear',
        // queue: false
    },
});

$(document).ready(function () {
    $("#myCarousel").on("slide.bs.carousel", function (e) {
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 4;
        var totalItems = $(".carousel-item").length;

        if (idx >= totalItems - (itemsPerSlide - 1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i = 0; i < it; i++) {
                // append slides to end
                if (e.direction == "left") {
                    $(".carousel-item")
                        .eq(i)
                        .appendTo(".carousel-inner");
                } else {
                    $(".carousel-item")
                        .eq(0)
                        .appendTo($(this).find(".carousel-inner"));
                }
            }
        }
    });
});
