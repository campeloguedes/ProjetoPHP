var h_tela = 0;
var w_tela = 0;
var scroll_site = 0;
var y = 0;
var controle_click = false;
var top = 0;
var id = 0;
var url;


$(document).ready(function (e) {

    allFunctions();
});

function loadAjust() {
    //recebendo valores tela
    h_tela = $(window).height();
    w_tela = $(window).width();


    // se existir a galeria, descomentar
    // if (w_tela < 1023) {
    //     $(".abrir-galeria").css('display', 'block');
    // }else{
    //     $(".abrir-galeria").css('display', 'none');
    //     $("#area-galeria-left-int").removeClass('abrir-menu');
    // }

    $("#lt-page, #lt-int-page").css('min-height', h_tela);


    if (w_tela < 960) {
        $('#slider_lt li , #slider_lt li ins').css('height', h_tela + 'px');
        $('#slider_lt img').css('max-height', h_tela + 'px').css('max-width', w_tela + 'px');
    } else {
        $('#slider_lt li , #slider_lt li ins').css('height', h_tela - 90 + 'px');
        $('#slider_lt img').css('max-height', h_tela - 90 + 'px').css('max-width', w_tela + 'px');
    }

}

/**
 * @param {any} id
 */
function mov_scroll(id) {

    controle_click = true;

    if (controle_click == true) {
        $('#bt_menu').removeClass('open');
        $("#area_menu_mobile").removeClass("slideRight", 200);
        $('#mask_menu').fadeOut(200);
        unlock_scroll();
        controle_click = false;
    }
    if (id === 'home') {

        $('html, body').animate({
            scrollTop: 0
        }, 500);
    } else {
        if (w_tela < 1008) {
            $('html, body').animate({
                scrollTop: $('#' + id).offset().top - 50
            }, 500);
        } else {
            $('html, body').animate({
                scrollTop: $('#' + id).offset().top - 50
            }, 500);
        }
    }
}


function allFunctions() {

    $(".title-bar button").click(function () {
        lock_scroll();
    });

    $(".js-off-canvas-overlay.is-overlay-fixed, .m-mobile .close-button").click(function () {
        unlock_scroll();
    });

    //carrega swiper
    setTimeout(function () {
        $(".swiper-wrapper").animate({opacity: 1}, 200);
    }, 400);

    //google maps desabilita scroll
    $('#mapa iframe').addClass('scrolloff');
    $('#mapa').on("mouseup", function () {
        $('#mapa iframe').addClass('scrolloff');
    });
    $('#mapa').on("mousedown", function () {
        $('#mapa iframe').removeClass('scrolloff');
    });
    $('#mapa iframe').mouseleave(function () {
        $('#mapa iframe').addClass('scrolloff');
    });


    //select
    $(".form-select select ").change(function () {
        var rec = $(this).parent('.form-select').find('strong');
        var val = $(this).val();
        $(this).find('option').each(function (index, element) {
            if ($(element).val() == val) {
                rec.html($(element).html());
            }
        });
    });

    //executa ao carregar página
    window.onload = function () {
        setTimeout('loadAjust()', 200);
    };
    window.onresize = loadAjust;

    // evento scroll
    $(window).scroll(function () {
        scroll_site;
        y = $(document).scrollTop();

      //   if (y > 50) {
      //       $(".title-bar").addClass('title-bar-bg-active');
      //       $(".title-bar .title-bar-title").css('opacity', 1);
      //   } else {
      //       $(".title-bar").removeClass('title-bar-bg-active');
      //       $(".title-bar .title-bar-title").css('opacity', 0);
      //   }

        // if(y > 300){
        //     $(".menu-fixed").addClass('open');
        // }else{
        //     $(".menu-fixed").removeClass('open');
        // }

    });

    $('.mei-int').each(function () {
        var $obj = $(this);
        $(window).scroll(function () {
            var yPos = -($(window).scrollTop() / $obj.data('speed'));
            var bgpos = '50% ' + (yPos + 200) + 'px';
            if (w_tela > 960) {
                $obj.css('background-position', bgpos);
            }
        });
    });
}


function lock_scroll() {
    $('body').bind('scroll touchmove mousewheel', function (e) {
        e.preventDefault();
        return false;
    });
}

function unlock_scroll() {
    $('body').unbind('scroll touchmove mousewheel');
}
