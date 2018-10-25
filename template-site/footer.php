
<footer>

    <?php if($page != "institucional" && $page != "parceiros" && $page != "noticias" && $page != "noticia") { ?>

    <section id="empresas" class="fluid">
        <div class="tit-empresa">
            <div class="tit-empresa-int">Instituições que apoiam <span>este projeto</span>
            </div>
        </div>

        <div class="responsive">

            <div class="area-slider">
                <div class="empresas swiper-container">
                    <div class="swiper-wrapper">


                        <?php
                        @require_once("controller/ParceiroController.class.php");
                        $ParceiroController = new ParceiroController();
                        $parceiros = $ParceiroController->listarOrdenado(" rand() ");
                        foreach($parceiros as $parceiro){
                        ?>

                        
                        <a class="swiper-slide" href="<?php echo $parceiro->url; ?>" target="_blank">
                            <div class="content-int">
                                <img src="<?php echo $urlFile; ?>/uploads/parceiro_logotipo/<?php echo $parceiro->logotipo; ?>">
                            </div>
                        </a>

                        <?php
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-empresa">
            <div class="area-pagination">
                <div id="empresaspagination" class="swiper-pagination"></div>
            </div>
        </div>

    </section>

    <section id="objetivos" class="fluid">
        <div class="responsive">

            <div class="area-objetivos">
                <h1>Nossas Intenções</h1>

                <p>
                    <?php echo nl2br($geral->objetivos); ?>
                </p>
            </div>


        </div>
    </section>

    <?php } ?>


    <div class="infos-rodape fluid">
        <div class="responsive">
            <?php if($page == "institucional" OR $page == "parceiros" OR $page == "noticias" OR $page == "noticia") { ?>
            <div class="divider-cont"></div>
            <?php } ?>
            <div class="area-menus">
                <div class="colunas">
                    <div class="tit">Institucional</div>

                    <ul>
                        
                        <?php
                        @require_once("controller/PaginatextoController.class.php");
                        $PaginatextoController = new PaginatextoController();
                        $paginatextos = $PaginatextoController->listarOrdenado(" posicao ");
                        foreach($paginatextos as $paginatexto){
                        ?>

                        
                        <li><a href="<?php echo $mainFolder; ?>/institucional/<?php echo $paginatexto->idpaginatexto; ?>/<?php echo trataString($paginatexto->titulo); ?>" <?php if($page == "institucional" && $idMP == $paginatexto->idpaginatexto){ ?> class="ativo" <?php } ?>><?php echo $paginatexto->titulo; ?></a></li>

                        <?php
                        }
                        ?>

                    </ul>
                </div>
                <div class="colunas">
                    <div class="tit">Mapa do Site</div>

                    <ul>

                        <li><a href="<?php echo $mainFolder; ?>/home">Página Inicial</a></li>
                        <li><a href="<?php echo $mainFolder; ?>/produtos">Produtos</a></li>
                        <li><a href="<?php echo $mainFolder; ?>/anuncie">Anuncie Grátis</a></li>
                        <li><a href="<?php echo $mainFolder; ?>/noticias">Notícias</a></li>
                    </ul>
                </div>
                <div class="colunas">
                    <div class="tit">Categorias</div>

                    <ul>
                        

                        <?php
                        @require_once("controller/CategoriaController.class.php");
                        $CategoriaController = new CategoriaController();
                        $categorias = $CategoriaController->listarOrdenado("nome");
                        foreach($categorias as $categoria){
                        ?>

                        
                        <li>
                        <a href="<?php echo $mainFolder; ?>/categoria/<?php echo $categoria->idcategoria; ?>/<?php echo trataString($categoria->nome); ?>"><?php echo $categoria->nome; ?></a></li>

                        <?php
                        }
                        ?>
                        
                    </ul>

                </div>
            </div>

            <div class="area-infos">
                <h1>Contato</h1>
                <div class="telefone"><?php echo mascara_telefone($geral->telefone,'9999 999 9999'); ?></div>
                <div class="email"><?php echo $geral->email; ?></div>

                <div class="social">
                	<?php if($geral->urlfacebook != ""){ ?><a href="<?php echo $geral->urlfacebook; ?>" target="_blank" class="facebook"></a><?php } ?>
                    <?php if($geral->urlyoutube != ""){ ?><a href="<?php echo $geral->urlyoutube; ?>" target="_blank" class="youtube"></a><?php } ?>
                    <?php if($geral->urlinstagram != ""){ ?><a href="<?php echo $geral->urlinstagram; ?>" target="_blank" class="instagram"></a><?php } ?>
                    <?php if($geral->urltwitter != ""){ ?><a href="<?php echo $geral->urltwitter; ?>" target="_blank" class="twitter"></a><?php } ?>
                </div>
            </div>
        </div>
    </div>

    <section id="copy" class="fluid">
        <div class="responsive">
            <div class="area-copy">
                <div class="copy">Copyright © <?php echo date("Y"); ?> - Todos os direitos reservados. 
                    <!--<a href="http://palmasite.com/" class="palmasite" target="_blank"></a>-->
                </div>

            </div>
        </div>
    </section>



</footer>


<script src="<?php echo $mainFolder; ?>/core/js/iscroll.js"></script>
<script src="<?php echo $mainFolder; ?>/core/js/swiper.js"></script>

<script>
    //foundation
    $(document).foundation();

    var destaque = new Swiper('.destaque', {
        pagination: '#destaquepagination.swiper-pagination',
        speed: 1000,
        autoplay: true,
        loop:true,
        paginationClickable: true,
        preventClicks: false,
        //effect: 'fade',
        slidesPerView: 0,
        centeredSlides: true,
        spaceBetween: 0,
        prevButton: '#prevdestaque',
        nextButton: '#nextdestaque',
    });

    var empresas = new Swiper('.empresas', {
        pagination: '#empresaspagination.swiper-pagination',
        speed: 1500,
        autoplay: true,
        paginationClickable: true,
        preventClicks: false,
        loop: true,
        slidesPerView: 6,
        centeredSlides: false,
        spaceBetween: 22,
        prevButton: '#prevempresas',
        nextButton: '#nextempresas',

        breakpoints: {
            967: {
                slidesPerView: 4,
            },

            767: {
                slidesPerView: 2,
            },
        }

    });

    var produtos = new Swiper('.produtos', {
        pagination: '#produtospagination.swiper-pagination',
        paginationClickable: true,
        preventClicks: false,
        loop: true,
        slidesPerView: 4,
        centeredSlides: false,
        spaceBetween: 20,
        prevButton: '#prevprodutos',
        nextButton: '#nextprodutos',
        breakpoints: {
            967: {
                slidesPerView: 4,
            },

            767: {
                slidesPerView: 2,
            }
        }
    });


</script>

</div>
</div>
</div>

<!-- load lightbox default -->
<div id="load">
    <span></span>
    <div></div>
</div>


</body>
</html>
