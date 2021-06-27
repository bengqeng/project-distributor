import masonry from 'masonry-layout/masonry';
var Luminous = require('luminous-lightbox').Luminous;
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

var options = {
    // Prefix for generated element class names (e.g. `my-ns` will
    // result in classes such as `my-ns-lightbox`. Default `lum-`
    // prefixed classes will always be added as well.
    namespace: null,
    // Which attribute to pull the lightbox image source from.
    sourceAttribute: "href",
    // Captions can be a literal string, or a function that receives the Luminous instance's trigger element as an argument and returns a string. Supports HTML, so use caution when dealing with user input.
    caption: null,
    // The event to listen to on the _trigger_ element: triggers opening.
    openTrigger: "click",
    // The event to listen to on the _lightbox_ element: triggers closing.
    closeTrigger: "click",
    // Allow closing by pressing escape.
    closeWithEscape: true,
    // Automatically close when the page is scrolled.
    closeOnScroll: true,
    // Disable close button
    showCloseButton: false,
    // A node to append the lightbox element to.
    appendToNode: document.body,
    // A selector defining what to append the lightbox element to.
    // This will take precedence over `appendToNode`.
    appendToSelector: null,
    // If present (and a function), this will be called
    // whenever the lightbox is opened.
    onOpen: null,
    // If present (and a function), this will be called
    // whenever the lightbox is closed.
    onClose: null,
    // When true, adds the `imgix-fluid` class to the `img`
    // inside the lightbox. See https://github.com/imgix/imgix.js
    // for more information.
    includeImgixJSClass: true,
    // Add base styles to the page. See the "Theming"
    // section of README.md for more information.
    injectBaseStyles: true
};

var galleryOpts = {
    // Whether pressing the arrow keys should move to the next/previous slide.
    arrowNavigation: false
};

var luminousOpts = {
    // These options have the same defaults and potential values as the Luminous class.
};
new LuminousGallery(document.querySelectorAll(".gallery-demo"), {
    arrowNavigation: false,
});
