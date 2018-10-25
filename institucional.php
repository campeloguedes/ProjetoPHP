<?php

if( isset($idMP) ){
    
    @require_once("controller/PaginatextoController.class.php");
    $PaginatextoController = new PaginatextoController();
    $default = $PaginatextoController->listarPorId($idMP);
    
    if(empty($default)){
        @header("location:$mainFolder/home");
    }

} else { 
    
    @header("location:$mainFolder/home"); return; 

}

?>

<?php include "template-site/header.php"; ?>
<?php include "template-site/top.php"; ?>

    <section id="_institucional-page" class="fluid">

        <div class="area-page-tit">
            <h1><?php echo $default->titulo; ?></h1>
        </div>

        <div class="responsive">

            <div class="categorias">
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

            <div class="select-mobile">
                <div class="form-select">
                    <span><strong>Selecione uma categoria</strong></span>
                    <select name="categoria" required="true" aria-required="true" onchange="window.location=this.value;">

                           <?php
                            @require_once("controller/PaginatextoController.class.php");
                            $PaginatextoController = new PaginatextoController();
                            $paginatextos = $PaginatextoController->listarOrdenado(" posicao ");
                            foreach($paginatextos as $paginatexto){
                            ?>

                            
                            <option value="<?php echo $mainFolder; ?>/institucional/<?php echo $paginatexto->idpaginatexto; ?>/<?php echo trataString($paginatexto->titulo); ?>" <?php if($page == "institucional" && $idMP == $paginatexto->idpaginatexto){ ?> selected="selected" <?php } ?>><?php echo $paginatexto->titulo; ?></option>

                            <?php
                            }
                            ?>
                    </select>
                </div>
            </div>


            <p class="area-txt">

                <?php echo html_entity_decode($default->texto); ?>

            </p>


            <?php if($idMP == 4){ ?>


            <div class="area-logos-parceiros">
                <div class="fluid">


                    <?php
                    @require_once("controller/ParceiroController.class.php");
                    $ParceiroController = new ParceiroController();
                    $parceiros = $ParceiroController->listarOrdenado(" rand() ");
                    $cont = 1;
                    foreach($parceiros as $parceiro){
                    ?>

                    <?php if($cont == 1){ ?>
                    <li>
                    <?php } ?>

                        
                        <a href="<?php echo $parceiro->url; ?>" target="_blank">
                            <img src="<?php echo $urlFile; ?>/uploads/parceiro_logotipo/<?php echo $parceiro->logotipo; ?>" alt="">
                        </a>


                    <?php if($cont == 6){ $cont = 1; ?>
                    </li>
                    <?php } else { $cont++; } ?>

                    <?php } ?>

                    <?php if($cont != 1){ ?>
                    </li>
                    <?php } ?>

                </div>
            </div>



            <section id="empresas-mobile" class="fluid empresas-mobile">

                <div class="responsive">

                    <div class="area-slider">
                        <div class="empresas swiper-container">
                            <div class="swiper-wrapper">

                                <?php 
                                foreach($parceiros as $parceiro){
                                ?>

                                <a class="swiper-slide" href="<?php echo $parceiro->url; ?>" target="_blank">
                                    <div class="content-int">
                                        <img src="<?php echo $urlFile; ?>/uploads/parceiro_logotipo/<?php echo $parceiro->logotipo; ?>" alt="">
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

            <?php 
            }
            ?>
            
        </div>
    </section>

<?php include "template-site/footer.php"; ?>