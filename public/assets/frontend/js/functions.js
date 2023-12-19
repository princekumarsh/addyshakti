$(function() {

    "use strict";

    $('[data-copied]').on('click', function(e){
        e.preventDefault();
        var t = $(this);
        var str = t.text();
        t.prev( 'input' ).focus().select();
        document.execCommand( 'copy' );
        t.prev( 'input' ).blur();
        t.text( t.data( 'copied' ) );
        setTimeout(function(){
            t.text(str);
        }, 2000);
    });

     $(".user-sub-menu > a").on("click", function (e) {
         e.preventDefault();
         var ul = $(this).next("ul");
         var menu = $(this).parents(".user-menu");
         if (ul.is(":visible")) {
             ul.slideUp("fast");
         } else {
             menu.find(".user-sub-menu > ul:visible").slideUp();
             ul.slideDown("fast");
         }
     });

    $(document).on('click', '[data-code]', function(e){
        e.preventDefault();
        var t = $(this);
        if( !t.hasClass('link-revealed') ) {
            t.addClass('link-revealed');
            t.find('span').text( t.data('code') );
            t.parents('.item').addClass('code-revealed');
        }
    });

    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        responsive: {
            0: {
                items:1
            },
            600: {
                items:1
            },
            1000: {
                items:1
            }
        }
    });

    $('[data-countdown]').each(function(){
        var t = $(this);
        var countDownDate = new Date(t.data('countdown')).getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days    = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours   = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            var content = '';

            if( days > 0 ) {
                content += days + '<span>d</span> ';
            }

            if( hours > 0 ) {
                content += hours + '<span>h</span> ';
            }

            if( minutes > 0 ) {
                content += minutes + '<span>m</span> ';
            }

            content += seconds + '<span>s</span> ';

            t.html(content);

            if (distance < 0) {
                clearInterval(x);
                t.html('');
            }
        }, 1000);
    });

    $('[href="#"]').on('click', function(e){
        e.preventDefault();
    });

    $('.menu-view').on('click', function(e){
        e.preventDefault();
        $('.overlay-menu:not(.search-overlay)').addClass('visible');
    });

    $('.overlay-menu .close-button a').on('click', function(e){
        e.preventDefault();
        $('.overlay-menu').removeClass('visible');
    });

    $('.search-link').on('click', function(e){
        e.preventDefault();
        $('.search-overlay').addClass('visible');
    });

    $('.search-container .options input[type="hidden"] + ul > li a').on('click', function(e) {
        e.preventDefault();
        var t = $(this);
        var ul = t.parents('ul'),
        li = t.closest('li'),
        options = ul.closest('.options');
        var title = options.find('a:first > span');
        ul.find('li').removeClass('active');
        li.addClass('active');
        title.text(t.text());
        options.find('input:first').val(t.data('attr'));
    });

$( '[data-target-on-click]' ).on( 'click', function() {
    var t = $(this);
    setTimeout(function(){
        var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
        if( isSafari ) {
            t.removeAttr( 'target' );
        }
        window.location = t.data( 'target-on-click' );
    }, 1000);
});

});
