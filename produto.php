<?php
if (isset($idMP)) {
    @require_once("controller/ProdutoController.class.php");
    $ProdutoController = new ProdutoController();
    $produto = $ProdutoController->listarPorId($idMP);
    if (empty($produto)) {
        @header("location:$mainFolder/home");
    }
} else {
    @header("location:$mainFolder/home");
    return;
}
?>
<?php include "template-site/header.php"; ?>
<?php include "template-site/top.php"; ?>

    <script>
        $(function () {
            setTimeout(function () {
                $("#_produto-page .left").animate({opacity: 1}, 200);
            }, 500);
        });
    </script>


    <script>
        var control_sd = 0;

        $(function () {


            $("#large-house-sld").on('cycle-after', function (event, opts) {

                $('.zoom').zoom(); // add zoom
                $("#thumbs a").removeClass();


                $("#thumb-" + opts.nextSlide).addClass('ativo');

                var ver = Math.floor(parseInt(opts.nextSlide / 5));

                if (ver != control_sd) {
                    control_sd = ver;
                    $('#thumbs').cycle('goto', control_sd);
                }
            });
        })


    </script>


    <script>
        $(document).ready(function () {
            $('.zoom').zoom(); // add zoom
        });
    </script>



    <section id="_produto-page" class="fluid">
        <div class="responsive">

            <div class="area-page-tit-mobile">
                <h1>Produto</h1>
            </div>

            <div class="left">

                <div id="large-house-sld" class="slideshow"
                     data-cycle-slides="> .slice"
                     data-cycle-fx="fade"
                     data-cycle-swipe=true
                     data-cycle-swipe-fx="fade"
                     data-cycle-timeout="0"
                     data-cycle-prev="#large-house-sld-arrows-next"
                     data-cycle-next="#large-house-sld-arrows-prev"
                >


                    <?php
                    @require_once("controller/ProdutofotoController.class.php");
                    $ProdutofotoController = new ProdutofotoController();
                    $produtofotos = $ProdutofotoController->listarPorProduto($produto->idproduto);
                    $controle = 1;
                    foreach ($produtofotos as $produtofoto) {
                        $controle++;
                        ?>

                        <div class="slice">
                            <div class="slice-photo-content">
                                <span class="zoom" id="example_<?php echo $controle; ?>">
                                <img src="<?php
                                $pathfile = $urlFile . "/uploads/produtofoto_arquivo/" . $produtofoto->Produto->idproduto . "/";
                                $file = $pathfile . "1_" . $produtofoto->arquivo;
                                if (file_exists($file)) {
                                    echo $file;
                                } else {
                                    echo $pathfile . $produtofoto->arquivo;
                                }
                                ?>" alt="">
                                    </span>
                            </div>
                        </div>
                        <?php
                    }
                    ?>


                    <div class="cycle-pager"></div>

                </div>


                <div class="area-thumb">

                    <div class="area-carousel">
                        <div id="thumbs" class="slideshow"
                             data-cycle-slides="> li"
                             data-cycle-fx="fade"
                             data-cycle-timeout="0"
                             data-cycle-pager="#pager_slider div"
                             data-cycle-carousel-visible="5"
                             data-cycle-next="#nextthumb"
                             data-cycle-prev="#prevthumb"
                        >


                            <?php
                            $controle = -1;
                            $cont = 1;
                            foreach ($produtofotos as $produtofoto) {
                                $controle++;
                                ?>

                                <?php if ($cont == 1) { ?>
                                    <li>
                                <?php } ?>


                                <a <?php if ($controle == 0) { ?> class="ativo" <?php } ?>
                                        id="thumb-<?php echo $controle; ?>"
                                        onclick="$('#large-house-sld').cycle('goto',<?php echo $controle; ?>);">
                                    <img src="<?php
                                    $pathfile = $urlFile . "/uploads/produtofoto_arquivo/" . $produtofoto->Produto->idproduto . "/";
                                    $file = $pathfile . "2_" . $produtofoto->arquivo;
                                    if (file_exists($file)) {
                                        echo $file;
                                    } else {
                                        echo $pathfile . $produtofoto->arquivo;
                                    }
                                    ?>" alt="">
                                </a>


                                <?php if ($cont == 5) {
                                    $cont = 1; ?>
                                    </li>
                                <?php } else {
                                    $cont++;
                                } ?>

                            <?php } ?>

                            <?php if ($cont != 1) { ?>
                                </li>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="area-navs-carousel">
                        <a id="prevthumb"></a>
                        <a id="nextthumb"></a>
                    </div>
                </div>


            </div>
            <div class="right">

                <div class="top-desc">
                    <h1><?php echo $produto->titulo; ?></h1>
                    <h2>Categoria: <a
                                href="<?php echo $mainFolder; ?>/categoria/<?php echo $produto->Categoria->idcategoria; ?>/<?php echo trataString($produto->Categoria->nome); ?>"><?php echo $produto->Categoria->nome; ?></a>
                    </h2>

                    <p>
                        <?php echo html_entity_decode($produto->descricao); ?>
                    </p>

                    <div class="preco"><?php echo $produto->preco > 0 ? 'R$ '.money_reverse($produto->preco) : 'Sob Consulta'; ?></div>
                    <div class="formas">Formas de pagamento aceitas:
                        <span><?php echo $produto->fpagamento; ?></span></div>
                </div>

                <div class="area-social">
                    <div class="social">
                        <div class="social-mobile-center">

                            <a href="http://facebook.com/sharer.php?=<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>"
                               target="_blank" class="facebook"></a>

                            <a href="http://instagram.com/sharer.php?=<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>"
                               target="_blank" class="instagram"></a>

                            <a href="http://twitter.com/home?status=<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>"
                               target="_blank" class="twitter"></a>


                        </div>

                        <div class="txt">
                            Compartilhe este produto nas redes sociais
                        </div>
                    </div>
                </div>

                <div class="infos-bottom">
                    <div class="anunciantes">
                        <h1>Dados do Anunciante</h1>


                        <?php
                        @require_once("controller/AnuncianteController.class.php");
                        $AnuncianteController = new AnuncianteController();
                        $anunciante = $AnuncianteController->listarPorId($produto->Anunciante->idanunciante);
                        ?>
                        <div class="top-anunciante">
                            <div class="foto">
                                <img src="<?php echo $urlFile; ?>/uploads/anunciante_logotipo/<?php echo $anunciante->logotipo; ?>"
                                     alt="">
                            </div>
                            <div class="nome-anunciante"><?php echo $anunciante->titulo; ?></div>
                        </div>

                        <div class="infos-anunciantes">
                            <li class="telefone"><?php echo mascara_telefone($anunciante->telefone, '(99) 9999-9999?9'); ?></li>
                            <li class="whatsapp"><?php echo mascara_telefone($anunciante->telefone, '(99) 9999-9999?9'); ?></li>
                            <li class="email"><?php echo $anunciante->email; ?></li>
                        </div>

                        <div class="area-local">
                            <li class="local">
                                <?php echo nl2br($anunciante->endereco); ?>
                            </li>

                            <div id="mapa">
                                <?php echo html_entity_decode($anunciante->googlemaps); ?>
                            </div>
                        </div>
                    </div>

                    <div class="area-form">
                        <h1>Fale com o anunciante</h1>

                        <form action="<?php echo $mainFolder; ?>/post/EmailPost" method="POST" mp-form>

                            <input type="hidden" name="anunciante" value="<?php echo $anunciante->email; ?>"/>
                            <input type="hidden" name="produto" value="<?php echo $produto->titulo; ?>"/>

                            <div class="cmp">
                                <input type="text" name="nome" placeholder="Nome" autocomplete="off" required>
                            </div>
                            <div class="cmp">
                                <input type="email" name="email" placeholder="E-mail" autocomplete="off" required>
                            </div>
                            <div class="cmp">
                                <input type="text" name="telefone" placeholder="Telefone" autocomplete="off" required>
                            </div>
                            <div class="cmp">
                                <textarea name="mensagem" placeholder="Mensagem" autocomplete="off" required></textarea>
                            </div>

                            <button type="submit">Enviar mensagem</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>


        <section id="comentarios" class="fluid">
            <div class="responsive">
                <div id="fb-root"></div>
                <script>(function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.9";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>


                <div class="fb-comments" width="100%" data-href="<?php echo $_SERVER["RESQUEST_URI"]; ?>" data-numposts="5"></div>
            </div>
        </section>


        <div class="area-tit-produtos">
            <div class="tit-int"><span>Conhe&ccedil;a outros</span> produtos relacionados</div>
        </div>

        <div class="area-slider-produtos fluid">
            <div class="responsive">
                <div class="area-slider">

                    <div class="produtos swiper-container">
                        <div class="swiper-wrapper">


                            <?php
                            @require_once("controller/ProdutoController.class.php");
                            $ProdutoController = new ProdutoController();
                            $produtos = $ProdutoController->listarOnde(" idproduto <> " . $produto->idproduto . " and produto.categoria_idcategoria = ".$produto->Categoria->idcategoria."  order by rand() limit 6 ");
                            foreach ($produtos as $produto) {
                                ?>


                                <a class="swiper-slide"
                                   href="<?php echo $mainFolder; ?>/produto/<?php echo $produto->idproduto; ?>/<?php echo trataString($produto->titulo); ?>">
                                    <div class="content-int">
                                        <div class="foto">
                                            <img src="<?php echo $urlFile; ?>/uploads/produto_fotodestaque/1_<?php echo $produto->idproduto; ?>_<?php echo $produto->fotodestaque; ?>"
                                                 alt="">
                                        </div>

                                        <div class="tit-categorias"><?php echo $produto->Categoria->nome; ?></div>

                                        <div class="tit-produtos">
                                            <div class="mask-tit"></div>
                                            <?php echo $produto->titulo; ?>
                                        </div>

                                        <div class="preco"><?php echo $produto->preco > 0 ? 'R$ '.money_reverse($produto->preco) : 'Sob Consulta'; ?></div>
                                    </div>
                                </a>

                                <?php
                            }
                            ?>

                        </div>
                    </div>
                    <div id="produtospagination" class="swiper-pagination"></div>
                </div>
            </div>
        </div>

    </section>

<?php include "template-site/footer.php"; ?>