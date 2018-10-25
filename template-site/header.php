
<?php
@require_once("controller/GeralController.class.php");
$GeralController = new GeralController();
$geral = $GeralController->listarPorId(1);
?>

<!doctype html>
<html class="no-js" lang="pt-br">
<head>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <meta charset="iso-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport"
          content="target-densitydpi=device-dpi, width=device-width, user-scalable=no, maximum-scale=1, minimum-scale=1"/>

    <title><?php echo $siteName; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $mainFolder; ?>/includes/css/app.css?<?php echo rand(); ?>">
    <link rel="stylesheet" href="<?php echo $mainFolder; ?>/includes/css/mobile.css?<?php echo rand(); ?>">
    <script src="<?php echo $mainFolder; ?>/includes/js/app.js?<?php echo rand(); ?>"></script>
    <script src="<?php echo $mainFolder; ?>/includes/js/jquery.cycle2.js?<?php echo rand(); ?>"></script>
    <script src="<?php echo $mainFolder; ?>/includes/js/jquery.cycle2.carousel.js?<?php echo rand(); ?>"></script>
    <script src="<?php echo $mainFolder; ?>/includes/js/jquery.cycle2.swipe.js?<?php echo rand(); ?>"></script>
    <script src="<?php echo $mainFolder; ?>/includes/js/jquery.cycle2.center.js?<?php echo rand(); ?>"></script>
    <script src="<?php echo $mainFolder; ?>/includes/js/jquery.cycle2.caption2.js?<?php echo rand(); ?>"></script>
    <script src="<?php echo $mainFolder; ?>/includes/js/jquery.cycle2.scrollVert.js?<?php echo rand(); ?>"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <link rel="stylesheet" type="text/css" href="<?php echo $mainFolder; ?>/includes/css/fallback.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $mainFolder; ?>/includes/lib/jquery.sweetalert2.css" />
    <script type="text/javascript" src="<?php echo $mainFolder; ?>/includes/lib/jquery.sweetalert2.js"></script>
    <script type="text/javascript" src="<?php echo $mainFolder; ?>/includes/lib/jquery.form.js"></script>
    <script type="text/javascript" src="<?php echo $mainFolder; ?>/includes/js/mp-form-ajax.js"></script>
    <script type="text/javascript" src="<?php echo $mainFolder;?>/includes/js/jquery.zoom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>


    <script type="text/javascript">
        $.fn.cycle.defaults.autoSelector = '.slideshow';
        new WOW().init();

        $(function () {
            $.mediaplus = {
                'mainFolder': '<?php echo $mainFolder; ?>'
            };
        });
        window.mainFolder = '<?php echo $mainFolder; ?>';
        window.idMP = '';
        window.descMP = '';
        window.mpPage = '<?php echo ucfirst($page); ?>';
        window.mainTitle = '<?php echo $siteName; ?>';
    </script>

    <?php if($page != "home") { ?>

        <style>
            @media (max-width: 1023px){
                #conteudo-page{
                    margin-top: 60px;
                }
            }

            .title-bar{
                background:#2A2A7F !important
            }

            .title-bar .title-bar-title{
                opacity: 1 !important;
            }
        </style>

    <?php } ?>


</head>
<body>


<div class="m-mobile off-canvas position-left" id="menuMobile" data-off-canvas>

    <button class="close-button" aria-label="Close menu" type="button" data-close>
        <span aria-hidden="true">&times;</span>
    </button>

    <ul class="vertical menu">
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

<div class="off-canvas-content" data-off-canvas-content>

    <div id="lt" class="fluid">
        <div id="lt-int"></div>
    </div>

    <div id="lt-scroll" class="fluid">
        <div id="lt-scroll-int"></div>
    </div>
