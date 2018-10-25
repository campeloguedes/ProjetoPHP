<div id="MenuEsquerdo">
  <div id="text1">
  	<a onclick="hideText();" href="#" class="minimizar" title="minimizar menu"><img src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/icon_minimizar.gif" alt="Minimizar" /><span>minimizar menu</span></a>

  	<ul>
			<li style='display:none;' id='menu_6'><a <?php if(strtolower($page)=="listanunciante" || strtolower($page)=="cadanunciante" || strtolower($page)=="cropanunciante" || strtolower($page)=="orderanunciante" || strtolower($page)=="crop2anunciante"){?> class="select" <?php } ?> href='<?php echo $mainFolder; ?>/controlplus/listAnunciante' title='Anunciante'>Anunciantes</a></li>
			<li style='display:none;' id='menu_4'><a <?php if(strtolower($page)=="listcategoria" || strtolower($page)=="cadcategoria" || strtolower($page)=="cropcategoria" || strtolower($page)=="ordercategoria" || strtolower($page)=="crop2categoria"){?> class="select" <?php } ?> href='<?php echo $mainFolder; ?>/controlplus/listCategoria' title='Categoria'>Categorias</a></li>
			<li style='display:none;' id='menu_3'><a <?php if(strtolower($page)=="listdestaque" || strtolower($page)=="caddestaque" || strtolower($page)=="cropdestaque" || strtolower($page)=="orderdestaque" || strtolower($page)=="crop2destaque"){?> class="select" <?php } ?> href='<?php echo $mainFolder; ?>/controlplus/listDestaque' title='Destaque'>Destaques</a></li>
			<li style='display:none;' id='menu_10'><a <?php if(strtolower($page)=="listgeral" || strtolower($page)=="cadgeral" || strtolower($page)=="cropgeral" || strtolower($page)=="ordergeral" || strtolower($page)=="crop2geral"){?> class="select" <?php } ?> href='<?php echo $mainFolder; ?>/controlplus/cadGeral' title='Geral'>Geral</a></li>
			<li style='display:none;' id='menu_9'><a <?php if(strtolower($page)=="listnoticia" || strtolower($page)=="cadnoticia" || strtolower($page)=="cropnoticia" || strtolower($page)=="ordernoticia" || strtolower($page)=="crop2noticia"){?> class="select" <?php } ?> href='<?php echo $mainFolder; ?>/controlplus/listNoticia' title='Notícia'>Notícias</a></li>
			<li style='display:none;' id='menu_8'><a <?php if(strtolower($page)=="listpaginatexto" || strtolower($page)=="cadpaginatexto" || strtolower($page)=="croppaginatexto" || strtolower($page)=="orderpaginatexto" || strtolower($page)=="crop2paginatexto"){?> class="select" <?php } ?> href='<?php echo $mainFolder; ?>/controlplus/listPaginatexto' title='Página De Texto'>Páginas De Texto</a></li>
			<li style='display:none;' id='menu_7'><a <?php if(strtolower($page)=="listparceiro" || strtolower($page)=="cadparceiro" || strtolower($page)=="cropparceiro" || strtolower($page)=="orderparceiro" || strtolower($page)=="crop2parceiro"){?> class="select" <?php } ?> href='<?php echo $mainFolder; ?>/controlplus/listParceiro' title='Parceiro'>Parceiros</a></li>
			<li style='display:none;' id='menu_11'><a <?php if(strtolower($page)=="listproduto" || strtolower($page)=="cadproduto" || strtolower($page)=="cropproduto" || strtolower($page)=="orderproduto" || strtolower($page)=="crop2produto"){?> class="select" <?php } ?> href='<?php echo $mainFolder; ?>/controlplus/listProduto' title='Produto'>Produtos</a></li>
			<li style='display:none;' id='menu_5'><a <?php if(strtolower($page)=="listsubcategoria" || strtolower($page)=="cadsubcategoria" || strtolower($page)=="cropsubcategoria" || strtolower($page)=="ordersubcategoria" || strtolower($page)=="crop2subcategoria"){?> class="select" <?php } ?> href='<?php echo $mainFolder; ?>/controlplus/listSubcategoria' title='Subcategoria'>Subcategorias</a></li>
  	</ul>
   </div>

 	<div id="text2" style="display:none;"><a onclick="showText();" href="#" class="minimizar" title="expandir menu"><img src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/icon_maximizar.gif" alt="Expandir" /><span>expandir menu</span></a></div>

</div>

<div id="MenuHorizontal">
     <ul id='mn_Controleacesso' <?php if(strtolower($page)=="listadmin" || strtolower($page)=="cadadmin" || strtolower($page)=="listperfil" || strtolower($page)=="cadperfil"){?> class="opened" <?php }else{ ?> style="display:none;" <?php } ?> >
        <li <?php if(strtolower($page)=="cadadmin"){echo 'class="active"';} ?>><a title='Cadastrar Administrador' href='<?php echo $mainFolder; ?>/controlplus/cadAdmin'>Cadastrar Administrador </a></li>
        <li <?php if(strtolower($page)=="listadmin"){echo 'class="active"';} ?>><a title='Listar Administradores' href='<?php echo $mainFolder; ?>/controlplus/listAdmin'>Listar Administradores </a></li>
        <li <?php if(strtolower($page)=="cadperfil"){echo 'class="active"';} ?>><a title='Cadastrar Perfil' href='<?php echo $mainFolder; ?>/controlplus/cadPerfil'>Cadastrar Perfil </a></li>
        <li <?php if(strtolower($page)=="listperfil"){echo 'class="active"';} ?>><a title='Listar Perfis' href='<?php echo $mainFolder; ?>/controlplus/listPerfil'>Listar Perfis </a></li>
     </ul>
     <ul id='mn_Logs' <?php if(strtolower($page)=="listlog"){?> class="opened" <?php }else{ ?> style="display:none;" <?php } ?> >
        <li <?php if(strtolower($page)=="listlog"){echo 'class="active"';} ?>><a title='Listar Logs' href='<?php echo $mainFolder; ?>/controlplus/listLog'>Listar Logs </a></li>
        <li style='visibility:hidden;' <?php if(strtolower($page)=="cadlog"){echo 'class="active"';} ?>><a title='Cadastrar Administrador' href='<?php echo $mainFolder; ?>/controlplus/cadAdmin'>Cadastrar Administrador </a></li>
     </ul>
     <ul id='mn_Anunciante' <?php if(strtolower($page)=="listanunciante" || strtolower($page)=="cadanunciante" || strtolower($page)=="cropanunciante" || strtolower($page)=="orderanunciante" || strtolower($page)=="crop2anunciante"){?> class="opened" <?php }else{ ?> style="display:none;" <?php } ?> >
        <li <?php if(strtolower($page)=="cadanunciante"){echo 'class="active"';} ?>><a title='Cadastrar Anunciante' href='<?php echo $mainFolder; ?>/controlplus/cadAnunciante'>Cadastrar Anunciante </a></li>
        <li <?php if(strtolower($page)=="listanunciante"){echo 'class="active"';} ?>><a title='Listar Anunciantes' href='<?php echo $mainFolder; ?>/controlplus/listAnunciante'>Listar Anunciantes </a></li>
     </ul>
     <ul id='mn_Categoria' <?php if(strtolower($page)=="listcategoria" || strtolower($page)=="cadcategoria" || strtolower($page)=="cropcategoria" || strtolower($page)=="ordercategoria" || strtolower($page)=="crop2categoria"){?> class="opened" <?php }else{ ?> style="display:none;" <?php } ?> >
        <li <?php if(strtolower($page)=="cadcategoria"){echo 'class="active"';} ?>><a title='Cadastrar Categoria' href='<?php echo $mainFolder; ?>/controlplus/cadCategoria'>Cadastrar Categoria </a></li>
        <li <?php if(strtolower($page)=="listcategoria"){echo 'class="active"';} ?>><a title='Listar Categorias' href='<?php echo $mainFolder; ?>/controlplus/listCategoria'>Listar Categorias </a></li>
     </ul>
     <ul id='mn_Destaque' <?php if(strtolower($page)=="listdestaque" || strtolower($page)=="caddestaque" || strtolower($page)=="cropdestaque" || strtolower($page)=="orderdestaque" || strtolower($page)=="crop2destaque"){?> class="opened" <?php }else{ ?> style="display:none;" <?php } ?> >
        <li <?php if(strtolower($page)=="caddestaque"){echo 'class="active"';} ?>><a title='Cadastrar Destaque' href='<?php echo $mainFolder; ?>/controlplus/cadDestaque'>Cadastrar Destaque </a></li>
        <li <?php if(strtolower($page)=="listdestaque"){echo 'class="active"';} ?>><a title='Listar Destaques' href='<?php echo $mainFolder; ?>/controlplus/listDestaque'>Listar Destaques </a></li>
        <li <?php if(strtolower($page)=="orderdestaque"){echo 'class="active"';} ?>><a title='Ordenar Destaques' href='<?php echo $mainFolder; ?>/controlplus/orderDestaque'>Ordenar Destaques </a></li>
     </ul>
     <ul id='mn_Noticia' <?php if(strtolower($page)=="listnoticia" || strtolower($page)=="cadnoticia" || strtolower($page)=="cropnoticia" || strtolower($page)=="ordernoticia" || strtolower($page)=="crop2noticia"){?> class="opened" <?php }else{ ?> style="display:none;" <?php } ?> >
        <li <?php if(strtolower($page)=="cadnoticia"){echo 'class="active"';} ?>><a title='Cadastrar Notícia' href='<?php echo $mainFolder; ?>/controlplus/cadNoticia'>Cadastrar Notícia </a></li>
        <li <?php if(strtolower($page)=="listnoticia"){echo 'class="active"';} ?>><a title='Listar Notícias' href='<?php echo $mainFolder; ?>/controlplus/listNoticia'>Listar Notícias </a></li>
     </ul>
     <ul id='mn_Paginatexto' <?php if(strtolower($page)=="listpaginatexto" || strtolower($page)=="cadpaginatexto" || strtolower($page)=="croppaginatexto" || strtolower($page)=="orderpaginatexto" || strtolower($page)=="crop2paginatexto"){?> class="opened" <?php }else{ ?> style="display:none;" <?php } ?> >
        <li <?php if(strtolower($page)=="cadpaginatexto"){echo 'class="active"';} ?>><a title='Cadastrar Página De Texto' href='<?php echo $mainFolder; ?>/controlplus/cadPaginatexto'>Cadastrar Página De Texto </a></li>
        <li <?php if(strtolower($page)=="listpaginatexto"){echo 'class="active"';} ?>><a title='Listar Páginas De Texto' href='<?php echo $mainFolder; ?>/controlplus/listPaginatexto'>Listar Páginas De Texto </a></li>
        <li <?php if(strtolower($page)=="orderpaginatexto"){echo 'class="active"';} ?>><a title='Ordenar Páginas De Texto' href='<?php echo $mainFolder; ?>/controlplus/orderPaginatexto'>Ordenar Páginas De Texto </a></li>
     </ul>
     <ul id='mn_Parceiro' <?php if(strtolower($page)=="listparceiro" || strtolower($page)=="cadparceiro" || strtolower($page)=="cropparceiro" || strtolower($page)=="orderparceiro" || strtolower($page)=="crop2parceiro"){?> class="opened" <?php }else{ ?> style="display:none;" <?php } ?> >
        <li <?php if(strtolower($page)=="cadparceiro"){echo 'class="active"';} ?>><a title='Cadastrar Parceiro' href='<?php echo $mainFolder; ?>/controlplus/cadParceiro'>Cadastrar Parceiro </a></li>
        <li <?php if(strtolower($page)=="listparceiro"){echo 'class="active"';} ?>><a title='Listar Parceiros' href='<?php echo $mainFolder; ?>/controlplus/listParceiro'>Listar Parceiros </a></li>
     </ul>
     <ul id='mn_Produto' <?php if(strtolower($page)=="listproduto" || strtolower($page)=="cadproduto" || strtolower($page)=="cropproduto" || strtolower($page)=="orderproduto" || strtolower($page)=="crop2produto"){?> class="opened" <?php }else{ ?> style="display:none;" <?php } ?> >
        <li <?php if(strtolower($page)=="cadproduto"){echo 'class="active"';} ?>><a title='Cadastrar Produto' href='<?php echo $mainFolder; ?>/controlplus/cadProduto'>Cadastrar Produto </a></li>
        <li <?php if(strtolower($page)=="listproduto"){echo 'class="active"';} ?>><a title='Listar Produtos' href='<?php echo $mainFolder; ?>/controlplus/listProduto'>Listar Produtos </a></li>
     </ul>
     <ul id='mn_Subcategoria' <?php if(strtolower($page)=="listsubcategoria" || strtolower($page)=="cadsubcategoria" || strtolower($page)=="cropsubcategoria" || strtolower($page)=="ordersubcategoria" || strtolower($page)=="crop2subcategoria"){?> class="opened" <?php }else{ ?> style="display:none;" <?php } ?> >
        <li <?php if(strtolower($page)=="cadsubcategoria"){echo 'class="active"';} ?>><a title='Cadastrar Subcategoria' href='<?php echo $mainFolder; ?>/controlplus/cadSubcategoria'>Cadastrar Subcategoria </a></li>
        <li <?php if(strtolower($page)=="listsubcategoria"){echo 'class="active"';} ?>><a title='Listar Subcategorias' href='<?php echo $mainFolder; ?>/controlplus/listSubcategoria'>Listar Subcategorias </a></li>
     </ul>
</div>

