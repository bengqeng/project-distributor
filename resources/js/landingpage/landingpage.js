import masonry from 'masonry-layout/masonry';
// import SimpleLightbox from "simplelightbox/dist/simple-lightbox";


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
    isFitWidth: true,
    animationOptions: {
        duration: 750,
        // easing: 'linear',
        // queue: false
    },
});


var lightbox = new SimpleLightbox({
    $items: $('.gallery a')
});

// var lightbox = new SimpleLightbox('.gallery', {
//     itemSelector: 'a',
// });

// $(document).ready(function () {
//     $("#myCarousel").on("slide.bs.carousel", function (e) {
//         var $e = $(e.relatedTarget);
//         var idx = $e.index();
//         var itemsPerSlide = 4;
//         var totalItems = $(".carousel-item").length;

//         if (idx >= totalItems - (itemsPerSlide - 1)) {
//             var it = itemsPerSlide - (totalItems - idx);
//             for (var i = 0; i < it; i++) {
//                 // append slides to end
//                 if (e.direction == "left") {
//                     $(".carousel-item")
//                         .eq(i)
//                         .appendTo(".carousel-inner");
//                 } else {
//                     $(".carousel-item")
//                         .eq(0)
//                         .appendTo($(this).find(".carousel-inner"));
//                 }
//             }
//         }
//     });
// });
