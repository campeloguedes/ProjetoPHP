<?php include "template-site/header.php"; ?>
<?php include "template-site/top.php"; ?>

    <section id="_listagem-page" class="fluid">

        <div class="area-page-tit-mobile">
            <h1>Listagem de produtos</h1>
        </div>

        <div class="responsive">

            <div class="select-mobile">
                <div class="form-select" mp-select>
                    <span><strong>Selecione uma categoria</strong></span>
                    <select name="filtro" required="true" aria-required="true" onchange="window.location=this.value;">

                        <option value="<?php echo $mainFolder; ?>/produtos">Selecione uma categoria</option>

                        <?php
                        @require_once("controller/CategoriaController.class.php");
                        $CategoriaController = new CategoriaController();
                        $categorias = $CategoriaController->listarOrdenado(" nome ");
                        foreach($categorias as $categoria){
                        ?>

                            <option value="<?php echo $mainFolder; ?>/categoria/<?php echo $categoria->idcategoria; ?>/<?php echo trataString($categoria->nome); ?>" <?php if($categoria->idcategoria == $idMP){ ?> selected="selected" <?php } ?>><?php echo $categoria->nome; ?></option>

                        <?php
                        }
                        ?>
                        

                    </select>
                </div>
            </div>

            <div class="left">


                <?php 
                foreach($categorias as $categoria){
                ?>
                <div class="area-menu">
                    <h1><?php echo $categoria->nome; ?></h1>

                    <ul>
                        

                        <?php
                        @require_once("controller/SubcategoriaController.class.php");
                        $SubcategoriaController = new SubcategoriaController();
                        $subcategorias = $SubcategoriaController->listarPorCategoria($categoria->idcategoria);
                        foreach($subcategorias as $subcategoria){
                        ?>

                        <li><a href="<?php echo $mainFolder; ?>/subcategoria/<?php echo $subcategoria->idsubcategoria; ?>/<?php echo trataString($subcategoria->nome); ?>" <?php if($page == 'subcategoria' && $idMP == $subcategoria->idsubcategoria){ ?> class="ativo" <?php } ?>><?php echo $subcategoria->nome; ?></a></li>

                        <?php
                        }
                        ?>

                    </ul>

                </div>
                <?php 
                }
                ?>

               
            </div>

            <div class="right">

                <div class="filtro">
                    <div class="filtro-int">
                        <div class="breadcrumb">

                            <?php 
                            $sql = " anunciante.liberado = 1 ";
                            if( empty($idMP) ){ $idMP ='all'; }
                            if( empty($descMP) ){ $descMP ='all'; }
                            if( empty($orderMP) ){ $orderMP ='mais-baratos'; }

                            ?>
                            
                            <?php 
                            if($page == 'categoria'){ 
                            $sql .= ' and produto.categoria_idcategoria = '.$idMP;
                            @require_once("controller/CategoriaController.class.php");
                            $CategoriaController = new CategoriaController();
                            $categoria_current = $CategoriaController->listarPorId($idMP);
                                echo $categoria_current->nome;
                            } 
                            ?>

                            <?php 
                            if($page == 'subcategoria'){ 
                            $sql .= ' and produto.subcategoria_idsubcategoria = '.$idMP;
                            @require_once("controller/SubcategoriaController.class.php");
                            $SubcategoriaController = new SubcategoriaController();
                            $subcategoria_current = $SubcategoriaController->listarPorId($idMP);
                            ?>
                            <?php echo $subcategoria_current->Categoria->nome; ?> /   <span><?php echo $subcategoria_current->nome; ?></span>
                            <?php } ?>

                            <?php 
                            if($page == 'busca'){ 
                                $texto = "_utf8 '%".utf8_encode($_POST['busca'])."%' collate utf8_unicode_ci ";
                                $sql .= ' and (  produto.titulo like '.$texto.' or produto.descricao like '.$texto.' or produto.preco like '.$texto.' or produto.fpagamento like '.$texto.' ) ';
                            ?>
                            Busca por <?php echo htmlentities($_POST['busca']); ?>
                            <?php } ?>
                            
                            <?php 
                            switch($orderMP){
                                
                                case 'mais-recentes':
                                    $sql .= ' order by idproduto desc ';
                                break;
                                case 'mais-caros':
                                    $sql .= ' order by preco desc ';
                                break;
                                case 'mais-baratos':
                                    $sql .= ' order by preco asc ';
                                break;
                                case 'relevancia':
                                    $sql .= ' order by preco asc ';
                                break;
                                case 'frete-gratis':
                                    $sql .= ' order by preco desc ';
                                break;
                                
                            }
                            ?>

                            <?php 
                            if($page == 'produtos'){ 
                            $sql = ' anunciante.liberado = 1 and idproduto <> 0 order by rand() limit 8 ';
                            ?>
                            Produtos da Hora
                            <?php } ?>


                        </div>

                        <div class="select">
                            <div class="form-select" mp-select>
                                <span><strong>Ordernar por</strong></span>
                                <select name="filtro" required="true" aria-required="true" onchange="window.location= '<?php echo $mainFolder.'/'.$page.'/'.$idMP.'/'.$descMP.'/'; ?>'+this.value;">
                                    
                                    <option value="">Ordernar por</option>
                                    <option value="mais-recentes" <?php if($orderMP == 'mais-recentes'){ ?> selected="selected" <?php } ?> >Mais Recentes</option>
                                    <option value="mais-caros" <?php if($orderMP == 'mais-caros'){ ?> selected="selected" <?php } ?>>Mais Caros</option>
                                    <option value="mais-baratos" <?php if($orderMP == 'mais-baratos'){ ?> selected="selected" <?php } ?>>Mais Baratos</option>
                                    <option value="relevancia" <?php if($orderMP == 'relevancia'){ ?> selected="selected" <?php } ?>>Relevância</option>
                                    <option value="frete-gratis" <?php if($orderMP == 'frete-gratis'){ ?> selected="selected" <?php } ?>>Frete Grátis</option>

                                </select>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="area-produtos">


                    <?php
                    @require_once("controller/ProdutoController.class.php");
                    $ProdutoController = new ProdutoController();
                    $produtos = $ProdutoController->listarOnde($sql);
                    $cont = 1;
                    $cont_gamb_2 = 1;
                    foreach($produtos as $produto){
                    ?>

                        
                        <a href="<?php echo $mainFolder; ?>/produto/<?php echo $produto->idproduto; ?>/<?php echo trataString($produto->titulo); ?>">

                            <div class="foto">
                                <img src="<?php echo $urlFile; ?>/uploads/produto_fotodestaque/1_<?php echo $produto->idproduto; ?>_<?php echo $produto->fotodestaque; ?>" alt="">
                            </div>

                            <div class="tit-categorias"><?php echo $produto->Categoria->nome; ?> / <?php echo $produto->Subcategoria->nome; ?></div>

                            <div class="tit-produtos">
                                <div class="mask-tit"></div>
                                <?php echo $produto->titulo; ?>
                            </div>

                            <div class="preco"><?php echo $produto->preco > 0 ? 'R$ '.money_reverse($produto->preco) : 'Sob Consulta'; ?></div>

                        </a>


                        <?php if($cont == 2){ $cont = 1; ?>
                        <!-- $cont == 2 -->
                        <div class="b"></div>
                        <?php } else { $cont++;} ?>


                        <?php if($cont_gamb_2 == 3){ $cont_gamb_2 = 1; ?>
                        <!-- $cont == 3 -->
                        <div class="a"></div>
                        <?php } else { $cont_gamb_2++;} ?>

                    <?php } ?>

                    <?php if($produtos->count() == 0){ ?>
                    <div class="nenhum">Nenhum produto encontrado.</div>
                    <?php } ?>
                  
                </div>

                <!-- 
                <div class="btn-carregar">
                    Carregando mais produtos <div class="load"></div>
                </div>
                -->

            </div>
        </div>
    </section>


<?php include "template-site/footer.php"; ?>