document.addEventListener("DOMContentLoaded", () => {
    var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

    if (width >= 992) {

    }

    $(".owl-carousel").owlCarousel({
        smartSpeed: 800,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                autoplay: true,
                loop: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
                margin: 10
            },
            991: {
                items: 4,
                loop: true,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
                margin: 10
            }
        }

    });
})