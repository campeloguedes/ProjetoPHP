<div class="title-bar">
    <div class="title-bar-left">
        <button class="menu-icon" type="button" data-open="menuMobile"></button>
        <span class="title-bar-title"><?php echo $siteName; ?></span>
    </div>
</div>

<div id="conteudo-page">
    <div id="conteudo-page-int">


        <section id="area-top" class="fluid">
            <div class="responsive">
                <div class="area-top-int">
                    <div class="logo">
                        <a href="<?php echo $mainFolder; ?>/home"></a>
                    </div>

                    <form action="<?php echo $mainFolder; ?>/busca" method="POST" class="busca">
                        <input type="text" name="busca" value="<?php echo @htmlentities($_POST['busca']); ?>"
                               placeholder="Pesquisar produtos..." autocomplete="off" required>
                        <button type="submit"></button>
                    </form>

                    <div class="area-info">
                        <div class="area-info-int">
                            <div class="telefone"><?php echo mascara_telefone($geral->telefone, '9999 999 9999'); ?></div>
                            <a href="<?php echo $mainFolder; ?>/contato" class="email"><?php echo $geral->email; ?></a>
                        </div>
                    </div>

                    <script>
                        $(function () {

                            var click = 1;

                            $(".area-menu-default").click(function () {

                                if (click == 1) {

                                    $(".sub-menu").fadeIn("fast", function () {
                                        $(this).addClass("open");
                                    })

                                    $(".mask-menu").fadeIn("fast", function () {
                                        $(".mask-menu").addClass("open");
                                    });

                                    $(".dtl-submenu").addClass("open");

                                    click = 0;

                                } else {
                                    $(".mask-menu, .sub-menu").fadeOut("fast", function () {
                                    });
                                    $(".sub-menu, .mask-menu").removeClass("open");

                                    click = 1;
                                }
                            });

                            $(".mask-menu").click(function () {
                                $(".mask-menu, .sub-menu").fadeOut("fast", function () {
                                });
                                $(".sub-menu, .mask-menu").removeClass("open");

                                click = 1;
                            });

                        })
                    </script>

                    <div class="mask-menu"></div>

                    <div class="area-menu-default">
                        <i></i>

                        <div class="sub-menu">
                            <div class="click-close"></div>
                            <div class="dtl-submenu">
                                <i></i>
                            </div>

                            <div class="menu-int">

                                <h1>Opções</h1>

                                <ul>
                                    <li>
                                        <a href="<?php echo $mainFolder; ?>/home" <?php if ($page == "home") { ?> class="ativo" <?php } ?>>Página
                                            Inicial</a></li>


                                    <li>
                                        <a href="<?php echo $mainFolder; ?>/produtos" <?php if ($page == "produtos") { ?> class="ativo" <?php } ?>>Produtos</a>
                                    </li>


                                    <?php
                                    @require_once("controller/PaginatextoController.class.php");
                                    $PaginatextoController = new PaginatextoController();
                                    $paginatextos = $PaginatextoController->listarOrdenado(" posicao ");
                                    foreach ($paginatextos as $paginatexto) {
                                        ?>


                                        <li>
                                            <a href="<?php echo $mainFolder; ?>/institucional/<?php echo $paginatexto->idpaginatexto; ?>/<?php echo trataString($paginatexto->titulo); ?>" <?php if ($page == "institucional" && $idMP == $paginatexto->idpaginatexto) { ?> class="ativo" <?php } ?>><?php echo $paginatexto->titulo; ?></a>
                                        </li>

                                        <?php
                                    }
                                    ?>


                                    <li>
                                        <a href="<?php echo $mainFolder; ?>/anuncie" <?php if ($page == "anuncie") { ?> class="ativo" <?php } ?>>Anuncie
                                            Grátis</a></li>
                                    <li>
                                        <a href="<?php echo $mainFolder; ?>/noticias" <?php if ($page == "noticias" OR $page == "noticia") { ?> class="ativo" <?php } ?>>Notícias</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $mainFolder; ?>/contato" <?php if ($page == "contato") { ?> class="ativo" <?php } ?>>Fale
                                            Conosco</a></li>
                                </ul>

                            </div>

                        </div>
                    </div>

                    <a href="<?php echo $mainFolder; ?>/anuncie" class="btn-anuncie">Anuncie Grátis</a>

                </div>
            </div>
        </section>

        <section id="categorias" class="fluid">
            <div class="responsive">
                <div class="categorias-int">


                    <?php
                    @require_once("controller/CategoriaController.class.php");
                    $CategoriaController = new CategoriaController();
                    $categorias = $CategoriaController->listarOrdenado("nome limit 8 ");
                    foreach ($categorias as $categoria) {
                        ?>

                        <div class="item-categoria">
                            <a href="<?php echo $mainFolder; ?>/categoria/<?php echo $categoria->idcategoria; ?>/<?php echo trataString($categoria->nome); ?>">


                                <div class="int">
                                    <i class="alimentacao"
                                       style="background: url(<?php echo $urlFile; ?>/uploads/categoria_icone/<?php echo $categoria->icone; ?>) no-repeat center center;"></i>
                                    <h1><?php echo $categoria->nome; ?></h1>
                                </div>
                            </a>

                            <div class="subcategoria">

                                <?php
                                @require_once("controller/SubcategoriaController.class.php");
                                $SubcategoriaController = new SubcategoriaController();
                                $subcategorias = $SubcategoriaController->listarPorCategoria($categoria->idcategoria);
                                foreach ($subcategorias as $subcategoria) {
                                    ?>


                                    <a class="lk"
                                         href="<?php echo $mainFolder; ?>/subcategoria/<?php echo $subcategoria->idsubcategoria; ?>/<?php echo trataString($subcategoria->nome); ?>"><?php echo $subcategoria->nome; ?></a>

                                    <?php
                                }
                                ?>

                            </div>


                        </div>


                        <?php
                    }
                    ?>

                </div>
            </div>
        </section>