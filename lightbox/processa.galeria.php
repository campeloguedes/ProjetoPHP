<?php @header("Content-Type: text/html; charset=ISO-8859-1", true); ?>

<script>$.fn.cycle.defaults.autoSelector = '.slideshow';</script>

<script>

    $(function () {

        setTimeout(function () {
            $('#load').fadeOut();
        }, 1000);

    });

    function toggleFullScreen() {
        $('#bt-tela').removeClass('maximizar').addClass('minimizar').stop();
        if ((document.fullScreenElement && document.fullScreenElement !== null) ||
            (!document.mozFullScreen && !document.webkitIsFullScreen)) {
            if (document.documentElement.requestFullScreen) {
                document.documentElement.requestFullScreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullScreen) {
                document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        } else {
            $('#bt-tela').removeClass('minimizar').addClass('maximizar').stop();
            if (document.cancelFullScreen) {
                document.cancelFullScreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitCancelFullScreen) {
                document.webkitCancelFullScreen();
            }
        }
    }

</script>

<script type="text/javascript">

    function tecla() {
        if (event.keyCode == 39) {
            $('#slider_lt').cycle('next');
        }

        if (event.keyCode == 37) {
            $('#slider_lt').cycle('prev');
        }

        if (event.keyCode == 32 || event.keyCode == 38 || event.keyCode == 40 || event.keyCode == 33 || event.keyCode == 34 || event.keyCode == 35 || event.keyCode == 36) {
            //$('html, body').animate({scrollTop: y}, 0);
            event.keyCode = 0;
            event.returnValue = false;
        }
    }
    document.onkeydown = tecla;

    $(function () {

        if (w_tela < 1060) {
            $('#slider_lt li , #slider_lt li ins').css('height', h_tela + 'px');
            $('#slider_lt img').css('max-height', h_tela + 'px').css('max-width', w_tela + 'px');
        } else {
            $('#slider_lt li , #slider_lt li ins').css('height', h_tela - 90 + 'px');
            $('#slider_lt img').css('max-height', h_tela - 90 + 'px').css('max-width', w_tela + 'px');
        }


        //efeitos imgs slider_min
        $('#slider_min li a').hover(function () {
            $(this).stop().animate({opacity: 1}, 200);
        }, function () {
            $(this).stop().animate({opacity: 0.3}, 200);
        });

    });


    $('#slider_lt , #slider_min').cycle({
        fx: 'fade',
        speed: 800,
        manualSpeed: 500,
        timeout: 0
    });


</script>


<script>
    var ref;

    $(document).ready(function () {

        $('#slider_min a').click(function () {
            $('#slider_min a').removeClass('ativo');
            $(this).addClass('ativo');
            var idImg = $(this).attr('idFoto');
            $('#slider_lt').cycle('goto', idImg);
        });

        $("#title-container-ref").html($('#_0').data('ref'));

        var control_sld_big2 = 0;

        var slideshows2 = $('#slider_lt').on('cycle-after', function (e, options) {


            $('#slider_min li a').removeClass('ativo');
            $('#_' + options.nextSlide).addClass('ativo');

            var ver = Math.floor(parseInt(options.nextSlide / 9));
            if (ver != control_sld_big2) {
                control_sld_big2 = ver;
                $('#slider_min').cycle('goto', control_sld_big2);
            }

            $("#title-container-ref").html($('#_' + options.nextSlide).data('ref'));

        });

    });

</script>


<div id="top-lt">


    <i>
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 306 306"
             xml:space="preserve">
			<polygon points="94.35,0 58.65,35.7 175.95,153 58.65,270.3 94.35,306 247.35,153"/>
		</svg>
    </i>

    <h5>Algum título</h5>

    <?php if (!isset($idMP)) { ?>

        <a onClick="lt(0,0,0);" class="close"></a>
        <a id="bt-tela" class="maximizar" onclick="toggleFullScreen()"></a>

    <?php } ?>

</div>


<div id="area-slider-lt">

    <!--Slider lt-->
    <div id="slider_lt" class="slideshow"
         data-cycle-fx="fade"
         data-cycle-swipe=true
         data-cycle-center-horz=true
         data-cycle-prev="#prev-lt"
         data-cycle-next="#next-lt"
         data-cycle-slides="> li"
         data-cycle-timeout=0
    >

        <li>
            <div class="centralizar">
                <img src="https://dummyimage.com/600x600" alt="">
            </div>
        </li>
        <li>
            <div class="centralizar">
                <img src="https://dummyimage.com/600x600" alt="">
            </div>
        </li>
        <li>
            <div class="centralizar">
                <img src="https://dummyimage.com/600x600" alt="">
            </div>
        </li>
        <li>
            <div class="centralizar">
                <img src="https://dummyimage.com/300x300" alt="">
            </div>
        </li>
        <li>
            <div class="centralizar">
                <img src="https://dummyimage.com/300x300" alt="">
            </div>
        </li>
        <li>
            <div class="centralizar">
                <img src="https://dummyimage.com/300x300" alt="">
            </div>
        </li>
        <li>
            <div class="centralizar">
                <img src="https://dummyimage.com/300x300" alt="">
            </div>
        </li>
        <li>
            <div class="centralizar">
                <img src="https://dummyimage.com/300x300" alt="">
            </div>
        </li>
        <li>
            <div class="centralizar">
                <img src="https://dummyimage.com/300x300" alt="">
            </div>
        </li>

    </div>

</div>

<div id="navs-slider-lt">

    <div>

        <a id="prev-lt">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 370.814 370.814"
                 xmlns:xlink="http://www.w3.org/1999/xlink">
                <polygon
                        points="292.92,24.848 268.781,0 77.895,185.401 268.781,370.814 292.92,345.961 127.638,185.401 		"/>
            </svg>
        </a>

        <a id="next-lt">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 370.814 370.814"
                 xmlns:xlink="http://www.w3.org/1999/xlink">
                <polygon
                        points="292.92,24.848 268.781,0 77.895,185.401 268.781,370.814 292.92,345.961 127.638,185.401 		"/>
            </svg>
        </a>

    </div>

</div>


<div id="area-controls-lt">

    <div class="responsive">

        <!--Slider min-->
        <div id="slider_min" class="slideshow"
             data-cycle-fx="scrollHorz"
             data-cycle-center-horz=true
             data-cycle-prev="a#prev-lt-min"
             data-cycle-next="a#next-lt-min"
             data-cycle-slides="> li"
             data-cycle-timeout=0
        >


            <li>

                <a id="_0" idFoto="0" class="centralizar ativo">
                    <img src="https://dummyimage.com/100x70" alt="">

                </a>
                <a id="_1" idFoto="1" class="centralizar">
                    <img src="https://dummyimage.com/100x70" alt="">

                </a>
                <a id="_2" idFoto="2" class="centralizar">
                    <img src="https://dummyimage.com/100x70" alt="">

                </a>
                <a id="_3" idFoto="3" class="centralizar">
                    <img src="https://dummyimage.com/100x70" alt="">

                </a>
                <a id="_4" idFoto="4" class="centralizar">
                    <img src="https://dummyimage.com/100x70" alt="">

                </a>
                <a id="_5" idFoto="5" class="centralizar">
                    <img src="https://dummyimage.com/100x70" alt="">

                </a>
                <a id="_6" idFoto="6" class="centralizar">
                    <img src="https://dummyimage.com/100x70" alt="">

                </a>
                <a id="_7" idFoto="7" class="centralizar">
                    <img src="https://dummyimage.com/100x70" alt="">

                </a>
                <a id="_8" idFoto="8" class="centralizar">
                    <img src="https://dummyimage.com/100x70" alt="">

                </a>
            </li>


        </div>

        <div id="navs-slider-lt-min">

            <a id="prev-lt-min">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 370.814 370.814"
                     xmlns:xlink="http://www.w3.org/1999/xlink">
                    <polygon
                            points="292.92,24.848 268.781,0 77.895,185.401 268.781,370.814 292.92,345.961 127.638,185.401 		"/>
                </svg>
            </a>

            <a id="next-lt-min">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 370.814 370.814"
                     xmlns:xlink="http://www.w3.org/1999/xlink">
                    <polygon
                            points="292.92,24.848 268.781,0 77.895,185.401 268.781,370.814 292.92,345.961 127.638,185.401 		"/>
                </svg>
            </a>

        </div>

    </div>

</div>



