<?php include "template-site/header.php"; ?>
<?php include "template-site/top.php"; ?>


<section id="destaque" class="fluid">
  <div class="area-slider">

    <div class="area-navs">
      <a id="prevdestaque" class="prevdestaque"></a>
      <a id="nextdestaque" class="nextdestaque"></a>
    </div>

    <div class="destaque swiper-container">
      <div class="swiper-wrapper">


        <?php
        @require_once("controller/DestaqueController.class.php");
        $DestaqueController = new DestaqueController();
        $destaques = $DestaqueController->listarOrdenado(" posicao ");
        foreach($destaques as $destaque){
          ?>

          <a href="<?php echo $destaque->url; ?>" target="_blank" mp-full class="swiper-slide">
            <div>
              <div class="content-int">
                <img src="<?php echo $urlFile; ?>/uploads/destaque_arquivo/<?php echo $destaque->arquivo; ?>" alt="">
              </div>
            </div>
          </a>

          <?php
        }
        ?>

      </div>
    </div>
    <div id="destaquepagination" class="swiper-pagination"></div>
  </div>
</section>

<div class="fluid">
  <div class="responsive">
    <div class="divider-destaque"></div>
  </div>
</div>

<section id="produtos" class="fluid">
  <div class="responsive">

    <div class="tit-page">Produtos da Hora</div>

    <div class="area-produtos">


      <?php
      @require_once("controller/ProdutoController.class.php");
      $ProdutoController = new ProdutoController();
      $produtos = $ProdutoController->listarOnde(" anunciante.liberado = 1 and destaque = 1 order by rand() limit 8 ");
      $cont = 1;
      $cont_gamb_a = 1;
      foreach($produtos as $produto){
        ?>


        <a href="<?php echo $mainFolder; ?>/produto/<?php echo $produto->idproduto; ?>/<?php echo trataString($produto->titulo); ?>">

          <div class="foto">
            <img src="<?php echo $urlFile; ?>/uploads/produto_fotodestaque/1_<?php echo $produto->idproduto; ?>_<?php echo $produto->fotodestaque; ?>" alt="">
          </div>

          <div class="tit-categorias"><?php echo $produto->Categoria->nome; ?></div>

          <div class="tit-produtos">
            <div class="mask-tit"></div>
            <?php echo $produto->titulo; ?>
          </div>

          <div class="preco"><?php echo $produto->preco > 0 ? 'R$ '.money_reverse($produto->preco) : 'Sob Consulta'; ?></div>

        </a>


        <?php if($cont == 2){ $cont = 1; ?>
          <!-- $cont == 2 -->
          <div class="b"></div>
        <?php } else { $cont++; } ?>

        <?php if($cont_gamb_a == 4){ $cont_gamb_a = 1; ?>
          <!-- $cont == 4 -->
          <div class="a"></div>
        <?php } else { $cont_gamb_a++; } ?>


      <?php } ?>


    </div>
  </div>

  <div class="area-btn">
    <a href="<?php echo $mainFolder; ?>/produtos">Veja mais produtos</a>
  </div>
</section>


<div class="mei">
  <div class="mei-int" data-speed="8" style="background:  url(<?php echo $urlFile; ?>/uploads/geral_parallax/<?php echo $geral->parallax; ?>) no-repeat fixed bottom; ">
    <div class="fluid">
      <div class="responsive">
        <h1 data-wow-offset="150" class="wow fadeInLeft">VOCÊ É MEI?</h1>
        <h2 data-wow-offset="150" class="wow fadeInLeft">Veja como é fácil anunciar no Feito no Tocantins <span>, é Grátis!</span></h2>
      </div>
    </div>
  </div>
</div>

<section id="opcoes" class="fluid">
  <div class="responsive">
    <div class="opcoes-int">


      <?php
      $cont = 1;
      for($a = 1; $a <= 4; $a++){
        ?>

        <div data-wow-offset="150" data-wow-delay="<?php echo ( $a * 0.5) - 0.5; ?>s" class="opc wow fadeIn animated">
          <div class="dtl-opc">
            <div class="numero"><?php echo $a; ?></div>
          </div>

          <i class="lapis" style=" background: url(<?php echo $urlFile; ?>/uploads/geral_e<?php echo $a; ?>icone/<?php echo $geral->{ 'e'.$a.'icone' }; ?>) no-repeat center center; "></i>

          <h1><?php echo $geral->{'e'.$a.'titulo' }; ?></h1>
          <p>
            <?php echo nl2br($geral->{'e'.$a.'descricao' }); ?>
          </p>
        </div>

        <?php if($cont == 2){ $cont = 1; ?>
          <div class="a"></div>
        <?php } else { $cont++; } ?>

        <?php
      }
      ?>


    </div>
  </div>
</section>


<?php include "template-site/footer.php"; ?>
