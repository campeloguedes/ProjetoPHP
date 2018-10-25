<?php

if(isset($idMP)){
    
    @require_once("controller/NoticiaController.class.php");
    $NoticiaController = new NoticiaController();
    $noticia = $NoticiaController->listarPorId($idMP);
    
    if(empty($noticia)){
        @header("location:$mainFolder/home");
    }

} else { 
    
    @header("location:$mainFolder/home"); return; 
}


if( empty($_SERVER['REQUEST_URI']) ){
    $_SERVER['REQUEST_URI'] = 'http://feitonotocantins.com.br/noticia/'.$idMP."/".$descMP;
}

?>
<?php include "template-site/header.php"; ?>
<?php include "template-site/top.php"; ?>

    <section id="_noticia-page" class="fluid">
        <div class="area-page-tit">
            <h1>Notícias</h1>
        </div>

        <div class="responsive">

            <div class="area-noticia">
                <h1><?php echo $noticia->titulo; ?></h1>

                <div class="area-social">
                    <div class="social">

                        <a href="http://facebook.com/sharer.php?=<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" target="_blank" class="facebook"></a>
                        <a href="http://twitter.com/home?status=<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" target="_blank" class="twitter"></a>
                        

                    </div>
                </div>

                <div class="data">Postado em <?php echo dt($noticia->dt); ?></div>

                <p>
                    <?php echo html_entity_decode($noticia->texto); ?>
                </p>

            </div>

            <div class="divider-noticia"></div>

            <div class="leia-mais">
                <div class="tit">Leia também</div>


                <div class="area-noticias">


                    <?php
                    @require_once("controller/NoticiaController.class.php");
                    $NoticiaController = new NoticiaController();
                    $noticias = $NoticiaController->listarOnde(" idnoticia <> ".$noticia->idnoticia." order by dt desc limit 3 ");
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

        </div>
    </section>

<?php include "template-site/footer.php"; ?>