(function ($) {
    "use strict";
    
    // loader
    var loader = function () {
        setTimeout(function () {
            if ($('#loader').length > 0) {
                $('#loader').removeClass('show');
            }
        }, 1);
    };
    loader();
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });
    
    
    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 90) {
            $('.nav-bar').addClass('nav-sticky');
            $('.carousel, .page-header').css("margin-top", "73px");
        } else {
            $('.nav-bar').removeClass('nav-sticky');
            $('.carousel, .page-header').css("margin-top", "0");
        }
    });
    
    
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });

    
    // --- Testimonial slider ---
    $(function () {
      if ($('.testimonial-carousel').length) {
        $('.testimonial-carousel').owlCarousel({
          loop: true,
          margin: 24,
          autoplay: true,
          autoplayTimeout: 3500,
          autoplayHoverPause: true,
          smartSpeed: 700,
          dots: true,
          nav: false,
          responsive: {
            0:   { items: 1 },
            576: { items: 1 },
            768: { items: 2 },
            992: { items: 3 }
          }
        });
      }
    });
    
    // --- Hero slider (the one with class .carousel .owl-carousel) ---
    $(function () {
      var $hero = $('.carousel .owl-carousel');
      if ($hero.length) {
        $hero.owlCarousel({
          loop: true,
          items: 1,
          autoplay: true,
          autoplayTimeout: 4000,
          smartSpeed: 800,
          dots: false,
          nav: true,
          navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>'
          ]
        });
      }
    });
    
})(jQuery);
          