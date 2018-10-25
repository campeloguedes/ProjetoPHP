<?php include("template/config-init.php"); ?>
<?php include("template/headers.php"); ?>
<!-- head -->

<!-- end head -->
<?php include("template/top.php"); ?>
<?php include("template/menu.php"); ?>
<!-- conteudo -->

<div id='Content'>
   <div class='category'>
		<span class='title'>ControlPlus</span> 
		<img src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/seta_indic.gif" alt='Info' /> 
		<span class='sub_title'>Informações Gerais</span> 
   </div>

 <br clear='all' /> 

   <div style='width:730px; margin:0 auto 0 25px;'>

    <?php require_once("controller/AnuncianteController.class.php"); ?>
    <?php $anuncianteController = new AnuncianteController(); ?>
    <?php $anunciantes = $anuncianteController->listarTodos()->count(); ?>
   <div onclick="window.location='listAnunciante';" style='float:left; width:362px; margin-bottom:10px; cursor:pointer;'>
    <div id='dv1_st_Anunciante' onmouseover="this.style.background='#FFFDB2'; document.getElementById('dv2_st_Anunciante').style.background='#FFFDB2';" onmouseout="this.style.background='#FFFFFF'; document.getElementById('dv2_st_Anunciante').style.background='#F4F4F4';" style='float:left; width:209px; padding:10px; color:#000; border:1px solid #E5E5E5; border-right:none;'>anunciantes</div><div onmouseover="this.style.background='#FFFDB2'; document.getElementById('dv1_st_Anunciante').style.background='#FFFDB2';" onmouseout="this.style.background='#F4F4F4'; document.getElementById('dv1_st_Anunciante').style.background='#FFFFFF';" id='dv2_st_Anunciante' style='background:#F4F4F4; float:left; width:108px; color: #F96400; font-size:20px; padding:6px; letter-spacing:-1.5px; border:1px solid #E5E5E5; font-weight:bold;'><?php echo $anunciantes; ?></div>
   </div>

    <?php require_once("controller/CategoriaController.class.php"); ?>
    <?php $categoriaController = new CategoriaController(); ?>
    <?php $categorias = $categoriaController->listarTodos()->count(); ?>
   <div onclick="window.location='listCategoria';" style='float:left; width:362px; margin-bottom:10px; cursor:pointer;'>
    <div id='dv1_st_Categoria' onmouseover="this.style.background='#FFFDB2'; document.getElementById('dv2_st_Categoria').style.background='#FFFDB2';" onmouseout="this.style.background='#FFFFFF'; document.getElementById('dv2_st_Categoria').style.background='#F4F4F4';" style='float:left; width:209px; padding:10px; color:#000; border:1px solid #E5E5E5; border-right:none;'>categorias</div><div onmouseover="this.style.background='#FFFDB2'; document.getElementById('dv1_st_Categoria').style.background='#FFFDB2';" onmouseout="this.style.background='#F4F4F4'; document.getElementById('dv1_st_Categoria').style.background='#FFFFFF';" id='dv2_st_Categoria' style='background:#F4F4F4; float:left; width:108px; color: #F96400; font-size:20px; padding:6px; letter-spacing:-1.5px; border:1px solid #E5E5E5; font-weight:bold;'><?php echo $categorias; ?></div>
   </div>

    <?php require_once("controller/DestaqueController.class.php"); ?>
    <?php $destaqueController = new DestaqueController(); ?>
    <?php $destaques = $destaqueController->listarTodos()->count(); ?>
   <div onclick="window.location='listDestaque';" style='float:left; width:362px; margin-bottom:10px; cursor:pointer;'>
    <div id='dv1_st_Destaque' onmouseover="this.style.background='#FFFDB2'; document.getElementById('dv2_st_Destaque').style.background='#FFFDB2';" onmouseout="this.style.background='#FFFFFF'; document.getElementById('dv2_st_Destaque').style.background='#F4F4F4';" style='float:left; width:209px; padding:10px; color:#000; border:1px solid #E5E5E5; border-right:none;'>destaques</div><div onmouseover="this.style.background='#FFFDB2'; document.getElementById('dv1_st_Destaque').style.background='#FFFDB2';" onmouseout="this.style.background='#F4F4F4'; document.getElementById('dv1_st_Destaque').style.background='#FFFFFF';" id='dv2_st_Destaque' style='background:#F4F4F4; float:left; width:108px; color: #F96400; font-size:20px; padding:6px; letter-spacing:-1.5px; border:1px solid #E5E5E5; font-weight:bold;'><?php echo $destaques; ?></div>
   </div>

    <?php require_once("controller/NoticiaController.class.php"); ?>
    <?php $noticiaController = new NoticiaController(); ?>
    <?php $noticias = $noticiaController->listarTodos()->count(); ?>
   <div onclick="window.location='listNoticia';" style='float:left; width:362px; margin-bottom:10px; cursor:pointer;'>
    <div id='dv1_st_Noticia' onmouseover="this.style.background='#FFFDB2'; document.getElementById('dv2_st_Noticia').style.background='#FFFDB2';" onmouseout="this.style.background='#FFFFFF'; document.getElementById('dv2_st_Noticia').style.background='#F4F4F4';" style='float:left; width:209px; padding:10px; color:#000; border:1px solid #E5E5E5; border-right:none;'>notícias</div><div onmouseover="this.style.background='#FFFDB2'; document.getElementById('dv1_st_Noticia').style.background='#FFFDB2';" onmouseout="this.style.background='#F4F4F4'; document.getElementById('dv1_st_Noticia').style.background='#FFFFFF';" id='dv2_st_Noticia' style='background:#F4F4F4; float:left; width:108px; color: #F96400; font-size:20px; padding:6px; letter-spacing:-1.5px; border:1px solid #E5E5E5; font-weight:bold;'><?php echo $noticias; ?></div>
   </div>

    <?php require_once("controller/PaginatextoController.class.php"); ?>
    <?php $paginatextoController = new PaginatextoController(); ?>
    <?php $paginatextos = $paginatextoController->listarTodos()->count(); ?>
   <div onclick="window.location='listPaginatexto';" style='float:left; width:362px; margin-bottom:10px; cursor:pointer;'>
    <div id='dv1_st_Paginatexto' onmouseover="this.style.background='#FFFDB2'; document.getElementById('dv2_st_Paginatexto').style.background='#FFFDB2';" onmouseout="this.style.background='#FFFFFF'; document.getElementById('dv2_st_Paginatexto').style.background='#F4F4F4';" style='float:left; width:209px; padding:10px; color:#000; border:1px solid #E5E5E5; border-right:none;'>páginas de texto</div><div onmouseover="this.style.background='#FFFDB2'; document.getElementById('dv1_st_Paginatexto').style.background='#FFFDB2';" onmouseout="this.style.background='#F4F4F4'; document.getElementById('dv1_st_Paginatexto').style.background='#FFFFFF';" id='dv2_st_Paginatexto' style='background:#F4F4F4; float:left; width:108px; color: #F96400; font-size:20px; padding:6px; letter-spacing:-1.5px; border:1px solid #E5E5E5; font-weight:bold;'><?php echo $paginatextos; ?></div>
   </div>

    <?php require_once("controller/ParceiroController.class.php"); ?>
    <?php $parceiroController = new ParceiroController(); ?>
    <?php $parceiros = $parceiroController->listarTodos()->count(); ?>
   <div onclick="window.location='listParceiro';" style='float:left; width:362px; margin-bottom:10px; cursor:pointer;'>
    <div id='dv1_st_Parceiro' onmouseover="this.style.background='#FFFDB2'; document.getElementById('dv2_st_Parceiro').style.background='#FFFDB2';" onmouseout="this.style.background='#FFFFFF'; document.getElementById('dv2_st_Parceiro').style.background='#F4F4F4';" style='float:left; width:209px; padding:10px; color:#000; border:1px solid #E5E5E5; border-right:none;'>parceiros</div><div onmouseover="this.style.background='#FFFDB2'; document.getElementById('dv1_st_Parceiro').style.background='#FFFDB2';" onmouseout="this.style.background='#F4F4F4'; document.getElementById('dv1_st_Parceiro').style.background='#FFFFFF';" id='dv2_st_Parceiro' style='background:#F4F4F4; float:left; width:108px; color: #F96400; font-size:20px; padding:6px; letter-spacing:-1.5px; border:1px solid #E5E5E5; font-weight:bold;'><?php echo $parceiros; ?></div>
   </div>

    <?php require_once("controller/ProdutoController.class.php"); ?>
    <?php $produtoController = new ProdutoController(); ?>
    <?php $produtos = $produtoController->listarTodos()->count(); ?>
   <div onclick="window.location='listProduto';" style='float:left; width:362px; margin-bottom:10px; cursor:pointer;'>
    <div id='dv1_st_Produto' onmouseover="this.style.background='#FFFDB2'; document.getElementById('dv2_st_Produto').style.background='#FFFDB2';" onmouseout="this.style.background='#FFFFFF'; document.getElementById('dv2_st_Produto').style.background='#F4F4F4';" style='float:left; width:209px; padding:10px; color:#000; border:1px solid #E5E5E5; border-right:none;'>produtos</div><div onmouseover="this.style.background='#FFFDB2'; document.getElementById('dv1_st_Produto').style.background='#FFFDB2';" onmouseout="this.style.background='#F4F4F4'; document.getElementById('dv1_st_Produto').style.background='#FFFFFF';" id='dv2_st_Produto' style='background:#F4F4F4; float:left; width:108px; color: #F96400; font-size:20px; padding:6px; letter-spacing:-1.5px; border:1px solid #E5E5E5; font-weight:bold;'><?php echo $produtos; ?></div>
   </div>

    <?php require_once("controller/SubcategoriaController.class.php"); ?>
    <?php $subcategoriaController = new SubcategoriaController(); ?>
    <?php $subcategorias = $subcategoriaController->listarTodos()->count(); ?>
   <div onclick="window.location='listSubcategoria';" style='float:left; width:362px; margin-bottom:10px; cursor:pointer;'>
    <div id='dv1_st_Subcategoria' onmouseover="this.style.background='#FFFDB2'; document.getElementById('dv2_st_Subcategoria').style.background='#FFFDB2';" onmouseout="this.style.background='#FFFFFF'; document.getElementById('dv2_st_Subcategoria').style.background='#F4F4F4';" style='float:left; width:209px; padding:10px; color:#000; border:1px solid #E5E5E5; border-right:none;'>subcategorias</div><div onmouseover="this.style.background='#FFFDB2'; document.getElementById('dv1_st_Subcategoria').style.background='#FFFDB2';" onmouseout="this.style.background='#F4F4F4'; document.getElementById('dv1_st_Subcategoria').style.background='#FFFFFF';" id='dv2_st_Subcategoria' style='background:#F4F4F4; float:left; width:108px; color: #F96400; font-size:20px; padding:6px; letter-spacing:-1.5px; border:1px solid #E5E5E5; font-weight:bold;'><?php echo $subcategorias; ?></div>
   </div>

   </div>

</div>
<!-- end conteudo -->
<?php include("template/bottom.php"); ?>
