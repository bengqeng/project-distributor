$(window).on("scroll", function () {
    if ($(window).scrollTop() > 50) {
        $(".navbar").addClass("shadow-lg");
    } else {
        $(".navbar").removeClass("shadow-lg");
    }
});
