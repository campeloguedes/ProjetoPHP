<?php include "template-site/header.php"; ?>
<?php include "template-site/top.php"; ?>

<section id="_noticias-page" class="fluid">

    <div class="area-page-tit">
        <h1>Notícias</h1>
    </div>

    <div class="responsive">
        <div class="area-noticias">


            <?php
            @require_once("controller/NoticiaController.class.php");
            $NoticiaController = new NoticiaController();
            $noticias = $NoticiaController->listarOrdenado(" dt desc ");
            foreach($noticias as $noticia){
            ?>

            
            <a href="<?php echo $mainFolder; ?>/noticia/<?php echo $noticia->idnoticia; ?>/<?php echo trataString($noticia->titulo); ?>">
                <h1>Postado em <?php echo dia($noticia->dt); ?> de <?php echo mesCompleto((int)mes($noticia->dt)); ?> de <?php echo ano($noticia->dt); ?></h1>
                <h2><?php echo $noticia->titulo; ?></h2>
            </a>

            <?php
            }
            ?>
            
            
        </div>
    </div>
</section>

<?php include "template-site/footer.php"; ?>