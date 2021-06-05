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
