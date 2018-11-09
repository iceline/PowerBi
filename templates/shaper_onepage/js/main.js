/**
* @package Helix3 Framework
* @author JoomShaper http://www.joomshaper.com
* @copyright Copyright (c) 2010 - 2015 JoomShaper
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
jQuery(function($) {

    var $body = $('body'),
    $wrapper = $('.body-innerwrapper'),
    $toggler = $('#offcanvas-toggler'),
    $close = $('.close-offcanvas'),
    $offCanvas = $('.offcanvas-menu');

    $toggler.on('click', function(event){
        event.preventDefault();
        stopBubble (event);
        setTimeout(offCanvasShow, 50);
    });

    $close.on('click', function(event){
        event.preventDefault();
        offCanvasClose();
    });

    var offCanvasShow = function(){
        $body.addClass('offcanvas');
        $wrapper.on('click',offCanvasClose);
        $close.on('click',offCanvasClose);
        $offCanvas.on('click',stopBubble);

    };

    var offCanvasClose = function(){
        $body.removeClass('offcanvas');
        $wrapper.off('click',offCanvasClose);
        $close.off('click',offCanvasClose);
        $offCanvas.off('click',stopBubble);
    };

    var stopBubble = function (e) {
        e.stopPropagation();
        return true;
    };

    //Mega Menu
    $('.sp-megamenu-wrapper').parent().parent().css('position','static').parent().css('position', 'relative');
    $('.sp-menu-full').each(function(){
        $(this).parent().addClass('menu-justify');
    });

    //Sticky Menu
    // $(document).ready(function(){
    //     $("body.sticky-header").find('#sp-header').sticky({topSpacing:0});
    //     // if has slideshow then add class
    //     if ($("body.com-sppagebuilder #sp-page-builder .sppb-slider-fullwidth-wrapper").length) {
    //         $("#sp-header-sticky-wrapper").addClass('has-slideshow');
    //     }
    // });

    //menu after slideshow
    $(document).ready(function(){
        // if has slideshow then add class
        if ($("body.com-sppagebuilder #sp-page-builder .sppb-slider-fullwidth-wrapper").length) {
            $("#sp-header").addClass('has-slideshow');
        }
    });

    // Add class menu-fixed when scroll
    var windowWidth = $(window).width();

    if ($('body').hasClass('home')) { var windowHeight = $(window).height() -70; } else { var windowHeight = $('#sp-menu').offset().top; };
    
    if (windowWidth > 979){
        //var stickyNavTop = $('#sp-menu').offset().top;
        var stickyNav = function(){
            var scrollTop = $(window).scrollTop();

            if (scrollTop > windowHeight) {
                $('#sp-header').removeClass('menu-fixed-out')
                .addClass('menu-fixed');
            }
            else
            {
                if($('#sp-header').hasClass('menu-fixed'))
                {
                    $('#sp-header').removeClass('menu-fixed').addClass('menu-fixed-out');
                }
                
            }

        };

        stickyNav();

        $(window).scroll(function() {
            stickyNav();
        });
    }else{
        $('#sp-header').removeClass('menu-fixed-out')
        .addClass('menu-fixed');
    }


    // ******* Menu link ******** //
    var homeSectionId = $('#sp-page-builder > .page-content > section:first-child').attr('id');   // home section id

    //if (homeSectionId) { var homeSectionId = homeSectionId } else { var homeSectionId = onePageUrl }

    $('.sp-megamenu-wrapper ul, .nav.menu').find('li:not(".no-scroll")').each(function(i, el) {
        var $that    = $(this),
            $anchor  = $that.children('a'),
            url      = $anchor.attr('href'),
            splitUrl = url.split('#');

        if ($that.hasClass('home')) {
            if (homeSectionId) { 
                $anchor.attr('href',onePageUrl+'#'+homeSectionId);
            }else{
                $anchor.attr('href',onePageUrl);
            }
        }else{
            if (typeof splitUrl !== undefined){
                $anchor.attr('href',onePageUrl+'#'+splitUrl[1]);
            };
        }
    });

    //one page nav with smoth scroll and active nav
    //$('.sp-megamenu-parent').onePageNav();
    $('.sp-megamenu-parent, .nav.menu').onePageNav({
        currentClass: 'active',
        changeHash: false,
        scrollSpeed: 900,
        scrollOffset: 30,
        scrollThreshold: 0.5,
        filter: ':not(.no-scroll)'
    });

    // $('.sp-megamenu-wrapper ul li a').click(function(){
    //     $('html, body').animate({
    //         scrollTop: $( $(this).attr('href') ).offset().top
    //     }, 900);
    //     return false;
    // });


    //Slideshow height
    var slideHeight = $(window).height();
    $('.sppb-slider-wrapper.sppb-slider-fullwidth-wrapper .sppb-slideshow-fullwidth-item-bg').css('height',slideHeight);

    //Tooltip
    $('[data-toggle="tooltip"]').tooltip();
    $(document).on('click', '.sp-rating .star', function(event) {
        event.preventDefault();

        var data = {
            'action':'voting',
            'user_rating' : $(this).data('number'),
            'id' : $(this).closest('.post_rating').attr('id')
        };

        var request = {
                'option' : 'com_ajax',
                'plugin' : 'helix3',
                'data'   : data,
                'format' : 'json'
            };

        $.ajax({
            type   : 'POST',
            data   : request,
            beforeSend: function(){
                $('.post_rating .ajax-loader').show();
            },
            success: function (response) {
                var data = $.parseJSON(response.data);

                $('.post_rating .ajax-loader').hide();

                if (data.status == 'invalid') {
                    $('.post_rating .voting-result').text('You have already rated this entry!').fadeIn('fast');
                }else if(data.status == 'false'){
                    $('.post_rating .voting-result').text('Somethings wrong here, try again!').fadeIn('fast');
                }else if(data.status == 'true'){
                    var rate = data.action;
                    $('.voting-symbol').find('.star').each(function(i) {
                        if (i < rate) {
                           $( ".star" ).eq( -(i+1) ).addClass('active');
                        }
                    });

                    $('.post_rating .voting-result').text('Thank You!').fadeIn('fast');
                }

            },
            error: function(){
                $('.post_rating .ajax-loader').hide();
                $('.post_rating .voting-result').text('Failed to rate, try again!').fadeIn('fast');
            }
        });
    });
    

});