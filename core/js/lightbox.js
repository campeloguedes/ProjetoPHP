/**
 @function: lt
 @description: abrir lightbox div lt
 @param: params {Object}
 @dependencie: $.mediaplus.mainFolder, lock_scroll, unlock_scroll
 */
function lt(params) {

    if (params) {

        $("#conteudo-page").animate({'opacity': 0.6}, 300);

        lock_scroll();

        $("#lt-int").html("");
        $("#load").fadeIn(200);

        $('#load span').animate({width: '100%'}, 2000);

        setTimeout(function () {

            $("#lt, #lt-int").fadeIn(400);

            $.ajax({

                url: $.mediaplus.mainFolder + '/lightbox/' + params.modulo + '.lightbox',
                type: 'POST',
                data: $.param(params),

                beforeSend: function (txt) {

                },

                success: function (txt) {

                    $("#lt-int").html(txt);
                    $("#load").fadeOut(200);

                },
                error: function (txt) {

                }

            });

        }, 2500);

    } else {
        unlock_scroll();
        $("#conteudo-page").animate({'opacity': 1}, 500);
        $("#lt, #lt-int, #load div").fadeOut();
        $('#load').find('span').css('width', '0px');

    }
}

/**
 @event: keyup
 @description: fechar lightbox via tecla esc
 @dependencie: lt
 */
$(document).keyup(function (e) {
    if (e.which == '27') {
        lt();
    }
});


// Lightbox page

/**
 @function: ltPage
 @description: abrir lightbox div lt-page
 @param: params {Object}
 @dependencie: $.mediaplus.mainFolder, lock_scroll, unlock_scroll
 */
function ltPage(params) {

    if (params) {

        $("#conteudo-page").animate({'opacity': 0.6}, 300);

        lock_scroll();

        $("#lt-int-page").html("");
        $("#load").fadeIn(200);

        $('#load').find('span').animate({width: '100%'}, 2000);

        setTimeout(function () {

            $("#lt-int, #lt-int-page").fadeIn(400);

            $.ajax({

                url: $.mediaplus.mainFolder + '/lightbox/' + params.modulo + '.lightbox',
                type: 'POST',
                data: $.param(params),

                beforeSend: function (txt) {

                },

                success: function (txt) {

                    $("#lt-int-page").html(txt);
                    $("#load").fadeOut(200);

                },
                error: function (txt) {

                }

            });

        }, 2500);

    } else {
        unlock_scroll();
        $("#conteudo-page").animate({'opacity': 1}, 500);
        $("#lt-int, #lt-int-page, #load div").fadeOut();
        $('#load').find('span').css('width', '0px');

    }
}

/**
 @event: keyup
 @description: fechar lightbox via tecla esc
 @dependencie: lt
 */
$(document).keyup(function (e) {
    if (e.which == '27') {
        ltPage();
    }
});
