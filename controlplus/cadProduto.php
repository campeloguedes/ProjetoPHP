<?php include('template/config-init.php'); ?> 
<?php 
 require('controller/ProdutoController.class.php');  
 $produtoController = new ProdutoController();  

 if(isset($idMP)){

    $produto =  $produtoController->listarPorId($idMP); 
   

 }else{   
  $produto = new Produto();   
    } 
?>
<?php include('template/headers.php'); ?> 
<!-- head -->
<script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/form-validate/jquery.validate.js'></script>
<script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/form-validate/jquery.maskedinput-1.2.2.js'></script>
<script type='text/javascript'>

  $('.area_btns').corner();

  $(function() { 
     $('#cpload1').hide();
     $('#formCad').validate({ 
           submitHandler: function(form) {
              $('.btn1').hide();
              $('.btn2').hide();
              $('#cpload1').show();
              $(form).ajaxSubmit({
	             dataType: 'html',
	             type: 'post',
	             success: response
               });
            },
     		rules: { 
               anunciante_idanunciante: { 
                   required: true 
               }, 

               categoria_idcategoria: { 
                   required: true 
               }, 

               subcategoria_idsubcategoria: { 
                   required: true 
               }, 

               titulo: { 
                   required: true, 
                   maxlength: 255 
               }, 

               descricao: { 
                   required: true 
               }, 

               preco: { 
                   required: true 
               }, 

               fpagamento: { 
                   required: true 
               }, 

               fotodestaque: { 
                   required: true, 
                   maxlength: 123 
               }, 

               destaque: { 
                   required: true 
               }

            } 
      }); 


       $('#preco').priceFormat({
         prefix: '', centsSeparator: '.', thousandsSeparator: ''
       });

  }); 

  jQuery(function($){ 
  }); 
 
  $(function() { 
  	   $('#info').dialog({ 
  	   		bgiframe: true,  
  	   		resizable: true,  
  	   		minHeight: 100,  
  	   		height: 110,  
  	   		modal: true,  
  	   		autoOpen: false  
      });
  });

  function response(data){
      data = remover_espacos(data);	   $('#cpload1').hide();
	   $('.btn1').show();
	   $('.btn2').show();
<?php if(isset($idMP)){ ?>
	   if(data==2){
         document.getElementById('info').innerHTML = '<p>Salvo com sucesso!</p>'; 
         $('#info').dialog('open'); 
		  window.location = '<?php echo $mainFolder; ?>/controlplus/cadProduto/<?php echo isset($idMP) ? $idMP : ''; ?>';
	   }
<?php }else{ ?>       if(data!=0){
         document.getElementById('info').innerHTML = '<p>Salvo com sucesso!</p>'; 
         $('#info').dialog('open'); 
         window.location = '<?php echo $mainFolder; ?>/controlplus/cropProduto/'+data; 
	   }
<?php } ?>       if(data==0){
         document.getElementById('info').innerHTML = '<p>Ocorreu um erro inesperado!<br/>Verifique os dados do cadastro e tente novamente!</p>';
         $('#info').dialog('open'); 
	   }
  }

 $(function() { 
		$("#confirmDel_Produtofoto").dialog({ 
  	   		bgiframe: true,  
				resizable: true,  
				minHeight: 100,  
				height: 140, 
				modal: true,  
				autoOpen: false,
				buttons: { 
				    "Confirmar": function() { 
						$("#formDel_Produtofoto").ajaxSubmit({
							dataType: "html",
							type: "post",
							success: responseDel_Produtofoto
						});
						$(this).dialog("close"); 
					},
					Cancelar: function() { 
						$(this).dialog("close"); 
					}
				}
		});
 });

 function responseDel_Produtofoto(data){	
		if(data==1){
			document.getElementById("info").innerHTML = "<p>Excluído com sucesso!</p>"; 
			document.getElementById(document.getElementById("idElemDel_Produtofoto").value).innerHTML = ""; 
			document.getElementById(document.getElementById("idElemDel_Produtofoto").value).style.display = "none"; 
			$("#info").dialog("open");
		}
		if(data==0){
			document.getElementById("info").innerHTML = "<p>Ocorreu um erro inesperado!<br/>Tente novamente!</p>";
			$("#info").dialog("open"); 
		}
 }

 function delProdutofoto(id){
		str = id.split("_");
		javascript:$("#confirmDel_Produtofoto").dialog("open"); 
		document.getElementById("idPkey_Produtofoto").setAttribute("value", document.getElementById("uploadify_Produtofotos_idprodutofoto_"+str[2]).value);
		document.getElementById("idElemDel_Produtofoto").setAttribute("value", id);
 }



$(function() { 
	$("#imageupload").dialog({ 
		resizable: true,
		width:425, 
		minHeight: 300,  
		height: 450,
		modal: true,  
		autoOpen: false  
	});
});

</script>

<script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/ckeditor/_sample/sample.js"></script>
<script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/ckeditor/adapters/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $mainFolder; ?>/controlplus/includes/js/ckeditor/_sample/sample.css" />
<script type="text/javascript">$(function(){
	var config_produto_descricao = {
		height: 300,
		toolbar:
				[
					['Source','-','NewPage','Preview','-','Templates'],
					['Cut','Copy','Paste','PasteText','PasteFromWord','-','SpellChecker', 'Scayt', 'Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
					'/',
					['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
					['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
					['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
					['Link','Unlink'],
					['Table','HorizontalRule','Smiley','SpecialChar'],
					'/',
					['Format','Font','FontSize'],
					['ShowBlocks', '-', 'Image']
				]
	};
	$('#produto_descricao').ckeditor(config_produto_descricao);
});					

function getproduto_descricao(){	
			var _oEditor = CKEDITOR.instances.produto_descricao;
			document.getElementById('descricao').value = _oEditor.getData();
}

</script><style type="text/css">.ui-state-highlight { width:180px; height:125px; }</style><script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/jquery-ui/development-bundle/ui/ui.sortable.js"></script>
<script type="text/javascript">
	$(function() {
		$("#fileSaves_uploadify_Produtofotos").sortable({
			placeholder: "ui-state-highlight",
			update: function(event, ui){ 
						var arr = new Array(); 
					    arr = $("#fileSaves_uploadify_Produtofotos").sortable("toArray");

						for(i = 0; i < arr.length; i++){
							str = arr[i].split("_");
							n = str[2];
							document.getElementById("uploadify_Produtofotos_posicao_"+n).value = i;	
						}

						$("#fileSaves_uploadify_Produtofotos").sortable("refresh");
			 			$("#fileSaves_uploadify_Produtofotos").sortable("refreshPositions");

			}

		});

		$("#fileSaves_uploadify_Produtofotos").disableSelection();

	});

</script>

<link href='<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/css/uploadify.css' rel='stylesheet' type='text/css' />
<script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/swfobject.js'></script>
<script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/jquery.uploadify.v2.1.0.js'></script>
<script type='text/javascript'>
	$(document).ready(function() {
		$('#uploadify_arquivo').uploadify({ 
			'uploader'       : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.swf',
			'script'         : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.php',
			'cancelImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/images/cancel.png',
			'buttonImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_add_file.png',
			'folder'         : '<?php echo $mainFolder; ?>/uploads/imagem_arquivo',
			'queueID'        : 'fileQueue_arquivo',
			'auto'           : true,
			'multi'          : false,
			'displayData'	 : 'speed',
			'fileExt'		 : '*.jpg;*.jpeg;*.gif;*.png'
		 });
	 });
</script>


<?php $name_file = date('YmdHis'); ?>
<script type='text/javascript'>
	$(document).ready(function() {
		$('#uploadify_fotodestaque').uploadify({ 
			'uploader'       : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.swf',
			'script'         : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.php',
			'cancelImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/images/cancel.png',
			'buttonImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_add_file.png',
			'folder'         : '<?php echo $mainFolder; ?>/uploads/produto_fotodestaque',
			'scriptData'     : {'fotodestaque_name_file' : '<?php echo $name_file; ?>', 'fotodestaque_width_1' : '0', 'fotodestaque_height_1' : '0', 'fotodestaque_width_file_2' : '0', 'fotodestaque_height_file_2' : '0', 'fotodestaque_width_file_3' : '0', 'fotodestaque_height_file_3' : '0', 'fotodestaque_width_file_4' : '0', 'fotodestaque_height_file_4' : '0', 'fotodestaque_width_file_5' : '0', 'fotodestaque_height_file_5' : '0'},
			'queueID'        : 'fileQueue_fotodestaque',
			'auto'           : true,
			'multi'          : false,
			'displayData'	 : 'speed',
			'fileExt'		 : '*.jpg;*.jpeg;*.gif;*.png'
		 });
	 });
</script>
<script type='text/javascript'>
 <?php
  $_SESSION['dir'] = $dir = 'uploads/produtofoto_arquivo/';
  if(!isset($idMP)){
 	$_SESSION['folderName'] = $folderName = rand(0,999999).date('Ymdhis');

 	if(!file_exists($dir.$folderName)){
 		mkdir($dir.$folderName);
 		chmod($dir.$folderName, 0777);
 	}
  }else{
 	$_SESSION['folderName'] = $folderName = $idMP;	
 	if(!file_exists($dir.$folderName)){
 		mkdir($dir.$folderName);
 		chmod($dir.$folderName, 0777);
 	}
   }
 ?>

 $(document).ready(function() {
 	$('#uploadify_Produtofotos').uploadify({ 
 		'uploader'       : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.swf',
 		'script'         : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.php',
 		'cancelImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/images/cancel.png',
 		'buttonImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_add_files.png',
 		'folder'         : '<?php echo $mainFolder; ?>/uploads/produtofoto_arquivo/<?php echo $folderName; ?>',
		'scriptData'     : {'arquivo_width_1' : '0', 'arquivo_height_1' : '450', 'arquivo_width_2' : '0', 'arquivo_height_2' : '60', 'arquivo_width_3' : '0', 'arquivo_height_3' : '0', 'arquivo_width_4' : '0', 'arquivo_height_4' : '0', 'arquivo_width_5' : '0', 'arquivo_height_5' : '0'},
 		'queueID'        : 'fileQueue_Produtofotos',
 		'auto'           : true,
 		'multi'          : true,
 		'displayData'	 : 'speed',
 		'fileExt'		 : '*.jpg'
		});
 });
</script>
<!-- end head -->

<?php include('template/top.php'); ?> 
<?php include('template/menu.php'); ?> 
<!-- conteudo -->

<div id='Content'> 
   <div class='category'>
		<span class='title'>Produto</span> 
		<img src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/seta_indic.gif" alt='Info' /> 
		<span class='sub_title'>Cadastro De Produto</span> 
   </div>

 <br clear='all' /> 

   <div id='Form'>
   <form class='formular' id='formCad' name='formCad' action='<?php echo $mainFolder; ?>/mediaplus/controller/mpcontroller' method='post' accept-charset='utf-8'>

       <input type='hidden' name='classe' id='classe' value='ProdutoController' />
       <input type='hidden' name='acao' id='acao' value='salvarEmCascata2' />
       <input type='hidden' name='objeto' id='objeto' value='Produto' />
<?php if(!isset($idMP)){ ?>
       <input type='hidden' name='retorno' id='retorno' value='lastID' />

<?php } ?>
       <input type='hidden' id='idproduto' name='idproduto' value='<?php echo $produto->idproduto; ?>' />

	   <?php 
        require('controller/AnuncianteController.class.php');  
        $anuncianteController = new AnuncianteController();  
       ?>
       <label>
       	   Anunciante:<br/>
       	   <select name='anunciante_idanunciante' id='anunciante_idanunciante' >
             			<option value=''>Selecione uma opção..</option>
                    <?php $anunciantes = $anuncianteController->listarOrdenado('anunciante.titulo'); ?>
 					<?php foreach($anunciantes as $anunciante){ ?>
             			<option value='<?php echo $anunciante->idanunciante; ?>' <?php if($produto->Anunciante->idanunciante == $anunciante->idanunciante){echo 'selected=\'selected\'';} ?> ><?php echo $anunciante->titulo; ?></option>
                    <?php } ?>
             </select><?php if($produto->Anunciante->idanunciante != '' && $produto->Anunciante->idanunciante != 0){ ?> <a href='<?php echo $mainFolder; ?>/controlplus/cadAnunciante/<?php echo $produto->Anunciante->idanunciante; ?>' style='color:#0066ff; margin-left:15px; float:left; padding-top:15px;' target='_blank' />Ver Dados</a><?php } ?><br/><br/>
       </label>

	   <?php 
        require('controller/CategoriaController.class.php');  
        $categoriaController = new CategoriaController();  
       ?>
       <script type="text/javascript">function upd_combo_Subcategoria(id){$.ajax({type: "POST",url: "<?php echo $mainFolder; ?>/mediaplus/controller/mpcontroller",data: "classe=SubcategoriaController&acao=listarPorCategoria&objeto=Subcategoria&uso=Combobox&campoExibe=nome&param=" + id,beforeSend: function() {}, success: function(txt) { $("#subcategoria_idsubcategoria").html(txt); }, error: function(txt) { document.getElementById("info").innerHTML = "<p>Ocorreu um erro inesperado!<br/>Tente novamente!</p>"; $("#info").dialog("open"); }	} ); }</script>       <label>
       	   Categoria:<br/>
       	   <select name='categoria_idcategoria' id='categoria_idcategoria' onchange='upd_combo_Subcategoria(this.value);'>
             			<option value=''>Selecione uma opção..</option>
                    <?php $categorias = $categoriaController->listarOrdenado('categoria.nome'); ?>
 					<?php foreach($categorias as $categoria){ ?>
             			<option value='<?php echo $categoria->idcategoria; ?>' <?php if($produto->Categoria->idcategoria == $categoria->idcategoria){echo 'selected=\'selected\'';} ?> ><?php echo $categoria->nome; ?></option>
                    <?php } ?>
             </select><?php if($produto->Categoria->idcategoria != '' && $produto->Categoria->idcategoria != 0){ ?> <a href='<?php echo $mainFolder; ?>/controlplus/cadCategoria/<?php echo $produto->Categoria->idcategoria; ?>' style='color:#0066ff; margin-left:15px; float:left; padding-top:15px;' target='_blank' />Ver Dados</a><?php } ?><br/><br/>
       </label>

	   <?php 
        require('controller/SubcategoriaController.class.php');  
        $subcategoriaController = new SubcategoriaController();  
       ?>
       <label>
       	   Subcategoria:<br/>
       	   <select name='subcategoria_idsubcategoria' id='subcategoria_idsubcategoria' >
             			<option value=''>Selecione uma opção..</option>
                    <?php $subcategorias = $subcategoriaController->listarOrdenado('subcategoria.nome'); ?>
 					<?php foreach($subcategorias as $subcategoria){ ?>
             			<option value='<?php echo $subcategoria->idsubcategoria; ?>' <?php if($produto->Subcategoria->idsubcategoria == $subcategoria->idsubcategoria){echo 'selected=\'selected\'';} ?> ><?php echo $subcategoria->nome; ?></option>
                    <?php } ?>
             </select><?php if($produto->Subcategoria->idsubcategoria != '' && $produto->Subcategoria->idsubcategoria != 0){ ?> <a href='<?php echo $mainFolder; ?>/controlplus/cadSubcategoria/<?php echo $produto->Subcategoria->idsubcategoria; ?>' style='color:#0066ff; margin-left:15px; float:left; padding-top:15px;' target='_blank' />Ver Dados</a><?php } ?><br/><br/>
       </label>

       <label>
       	   Título:<br/>
       	   <input type='text' name='titulo' id='titulo' value='<?php echo $produto->titulo; ?>' /><br/><br/>
       </label>

       <label>
       	   Descrição:<br/>
       </label>
		 <input type="hidden" value="" name="descricao" id="descricao" />
       <div style='float:left;' onclick='oEditor = CKEDITOR.instances.produto_descricao; largura_img_left = 323; largura_img_all = 646;'>
<textarea name='produto_descricao' id='produto_descricao'><?php echo html_entity_decode($produto->descricao); ?></textarea>
<br/><br/>
</div>
       

       <label>
       	   Preço:<br/>
       	   <input type='text' name='preco' id='preco' value='<?php echo money(money_reverse($produto->preco)); ?>' /><br/><br/>
       </label>

       <label>
       	   Formas De Pagamento:<br/>
       	   <textarea name='fpagamento' id='fpagamento'><?php echo $produto->fpagamento; ?></textarea><br/><br/>
       </label>

<!-- ******************************************************************************* -->
       <div style='float:left; width:100%;'>
          Foto De Destaque:<br/>
	   		<input type='hidden' name='fotodestaque' id='fotodestaque' value='<?php echo $produto->fotodestaque; ?>' />
			<input type='hidden' id='mainFolder' name='mainFolder' value='<?php echo $mainFolder; ?>'/>
            <input type='hidden' id='uploadify_fotodestaque_nameFile' name='uploadify_fotodestaque_nameFile' value='<?php echo $name_file; ?>'/>            <div id='fileQueue_fotodestaque'></div>
            <input type='file' name='uploadify_fotodestaque' id='uploadify_fotodestaque' />
	   		<input type='hidden' name='totalFiles_uploadify_fotodestaque' id='totalFiles_uploadify_fotodestaque' value='1' />
 	   		<div id='fileSaves_uploadify_fotodestaque' class='fileSaves_uploadify_style'>
                <?php if($produto->fotodestaque!=''){  ?>
		   			<input type='hidden' name='cont_uploadify_fotodestaque' id='cont_uploadify_fotodestaque' value='1' />
					<div id='div_fotodestaque'>
						<input type='hidden' name='uploadify_fotodestaque_1' id='uploadify_fotodestaque_1' value='<?php echo $produto->fotodestaque ?>' />
						<?php if(is_img($produto->fotodestaque)){ ?><img src='<?php echo $mainFolder; ?>/uploads/produto_fotodestaque/<?php echo $produto->fotodestaque; ?>' /><?php }else{ ?> <a href='<?php echo $mainFolder; ?>/uploads/produto_fotodestaque/<?php echo $produto->fotodestaque; ?>' target='_blank'><?php echo $produto->fotodestaque; ?></a> <?php } ?>
						<a href='<?php echo $mainFolder; ?>/controlplus/crop2Produto/<?php echo $idMP; ?>'><img title='Editar' alt='Editar' class='del' src='<?php echo $mainFolder; ?>/controlplus/includes/imgs/icoEdit.png'/></a>
						<a href="javascript:document.getElementById('fotodestaque').value = ''; document.getElementById('div_fotodestaque').innerHTML=''; document.getElementById('div_fotodestaque').style.display='none'; jQuery('#uploadify').mpDeleteFile('uploadify_fotodestaque'); "><img title='Excluir' alt='Excluir' class='del' src='<?php echo $mainFolder; ?>/controlplus/includes/imgs/icon_del.gif'/></a>
                    </div>
                <?php }else{ ?>
                	<input type='hidden' name='cont_uploadify_fotodestaque' id='cont_uploadify_fotodestaque' value='0' />
                <?php } ?>	   		</div>
       </div><br/>

<!-- ******************************************************************************* -->
       <label>
       	   Destaque Na Home?:
       	   <input type='hidden' name='destaque' id='destaque' value='<?php echo $produto->destaque == '' ? 0 : $produto->destaque; ?>' /><br/><br/>
       	   <input type='checkbox' class='checkbox' name='chbdestaque' id='chbdestaque' value='<?php echo $produto->destaque; ?>' onclick='mudaValCheckBox("destaque");' <?php if($produto->destaque == 1){echo 'checked="checked"';} ?> /><br/><br/>
       </label>

  <input type="hidden" name="totalSavesCascata" id="totalSavesCascata" value="1" />
  <!-- ******************************************************************************* -->
  <!--Collection Produtofotos-->

  <input type="hidden" name="typeCollection_1" id="typeCollection_1" value="object" />
  <input type="hidden" name="idCollection_1" id="idCollection_1" value="uploadify_Produtofotos" />
  <input type="hidden" name="classeCollection_1" id="classeCollection_1" value="ProdutofotoController" />
  <input type="hidden" name="objetoCollection_1" id="objetoCollection_1" value="Produtofoto" />

  <input type="hidden" name="typeObject_1" id="typeObject_1" value="f" />
  <div style="float:left; width:100%;">
       <div class="area_title"><div class="box_title"><span class="cad">FOTOS DO PRODUTO</span></div></div>
  		 <input type='hidden' name='Produtofotos' id='Produtofotos' value='apenas para funcionamento correto' /> 
  		 <input type='hidden' id='mainFolder' name='mainFolder' value='<?php echo $mainFolder; ?>'/>
  		 <input type='hidden' id='folderName' name='folderName' value='<?php echo $_SESSION['folderName']; ?>'/>
  		 <input type='hidden' id='dir' name='dir' value='<?php echo $_SESSION['dir']; ?>'/>
  		 <div id='fileQueue_Produtofotos'></div>
  		 <input type='file' name='uploadify_Produtofotos' id='uploadify_Produtofotos' />
  	     <input type='hidden' name='totalFiles_uploadify_Produtofotos' id='totalFiles_uploadify_Produtofotos' value='99999' />
		 <input type='hidden' name='uploadify_Produtofotos_fdel' id='uploadify_Produtofotos_fdel' value='delProdutofoto' />
  		 <input type='hidden' name='nameField' id='nameField' value='arquivo' />

  		 <div id='fileSaves_uploadify_Produtofotos' class='fileSaves_uploadify_style'>
  		 <?php if(isset($idMP)){
  					require('controller/ProdutofotoController.class.php');  
  					$produtofotoController = new ProdutofotoController();  
  					$produtofotos = $produtofotoController->listarPorProduto($idMP);
  		 ?>
  					<?php
  					$contProdutofotos = 0;
  					foreach($produtofotos as $produtofoto){
  						$contProdutofotos++;
  						?>
  						<div id='cuploadify_Produtofotos_<?php echo $contProdutofotos; ?>' class='camadaComposta'>
  							<a style='float:right;' href="javascript:delProdutofoto('cuploadify_Produtofotos_<?php echo $contProdutofotos; ?>'); jQuery('#uploadify').mpDeleteFile('uploadify_Produtofotos');"><img title='Excluir' alt='Excluir' class='del' src='<?php echo $mainFolder; ?>/controlplus/includes/imgs/icon_del.gif'/></a>
  							<?php if(is_img($produtofoto->arquivo)){ ?><img class='thumb' src='<?php echo $mainFolder; ?>/<?php echo $_SESSION['dir'] . $idMP."/".$produtofoto->arquivo; ?>' /><?php }else{ ?> <a href='<?php echo $mainFolder; ?>/<?php echo $_SESSION['dir'] . $idMP."/".$produtofoto->arquivo; ?>' target='_blank'><?php echo $produtofoto->arquivo; ?></a> <?php } ?>
							<input type="hidden" name="uploadify_Produtofotos_idprodutofoto_<?php echo $contProdutofotos; ?>" id="uploadify_Produtofotos_idprodutofoto_<?php echo $contProdutofotos; ?>" value="<?php echo $produtofoto->idprodutofoto; ?>"  />
							<input type="hidden" name="uploadify_Produtofotos_arquivo_<?php echo $contProdutofotos; ?>" id="uploadify_Produtofotos_arquivo_<?php echo $contProdutofotos; ?>" value="<?php echo $produtofoto->arquivo; ?>"  />
							<input type="hidden" name="uploadify_Produtofotos_posicao_<?php echo $contProdutofotos; ?>" id="uploadify_Produtofotos_posicao_<?php echo $contProdutofotos; ?>" value="<?php echo $produtofoto->posicao; ?>"  />
  						</div>
  						<?php
  					} ?>
  					<input type='hidden' name='cont_uploadify_Produtofotos' id='cont_uploadify_Produtofotos' value='<?php echo $produtofotos->count(); ?>' />
  					<input type='hidden' name='last_uploadify_Produtofotos' id='last_uploadify_Produtofotos' value='<?php echo $produtofotos->count(); ?>' />
				<?php 
  				}else{ ?>
  					<input type='hidden' name='cont_uploadify_Produtofotos' id='cont_uploadify_Produtofotos' value='0' />
  					<input type='hidden' name='last_uploadify_Produtofotos' id='last_uploadify_Produtofotos' value='0' />
  				 <?php
  				 }
  				 ?>
 		</div>
  		<input type='hidden' name='uploadify_Produtofotos_conteudoCam' id='uploadify_Produtofotos_conteudoCam' value='hidden*uploadify_Produtofotos_idprodutofoto_*nulo*Idprodutofoto#hidden*uploadify_Produtofotos_arquivo_*nulo*Arquivo#hidden*uploadify_Produtofotos_posicao_*nulo*Posicao' />
  </div>
  <!-- ******************************************************************************* -->
       <br/>
		<div class='area_btns'>
			<input type='submit' onclick='getproduto_descricao(); ' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_salvar.gif) no-repeat; width:101px; height:36px;' class='btn1' alt='Salvar' value='' />
			<input type='button' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_cancelar.gif) no-repeat; width:101px; height:36px;' class='btn2' alt='Cancelar' value='' onclick="window.location='<?php echo $mainFolder; ?>/controlplus/listProduto'" />
           <img style="float:left; margin:15px;" id="cpload1" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/cpload.gif"/>
       </div>
   </form>
   </div>


<div id='imageupload' title='controlplus - imagem'>
   				<form id='formCad2' name='formCad2' accept-charset='utf-8'>		
   					<input type="hidden" id="situacao" name="situacao" value="save" />
   					<input type="hidden" id="idimgdiv" name="idimgdiv" /> 	
   					<div id="htmlaux" style="display:none;"></div>
   						
   								<script type="text/javascript">
									//610px largura maxima.
									var sel = 0;
									var retorno = "";
									var largura_img_left; 
									var largura_img_all;
									function mudaTemplate(id, template){
										for(i = 1; i <= 3; i++){
											document.getElementById("a"+i).style.background = "#FFF";
											document.getElementById("a"+i).style.border = "1px solid #EEE";
											document.getElementById("a"+i).style.zIndex = "0";
										}

   	   									sel = template;
   	   									elem = document.getElementById(id);
   										elem.style.background='#FFFACD'; 
										elem.style.border='1px solid #FF9933'; 
										elem.style.zIndex='1'; 
   									}

   									function addImagem(){

   	   									//var template = sel;
   										for(i = 1; i <= 3; i++){
   	   										//alert(document.getElementById("a"+i).style.zIndex);
											if(document.getElementById("a"+i).style.zIndex == '1'){
												template = i;
											}
										}

										var imagem = "<?php echo $mainFolder; ?>/uploads/imagem_arquivo/"+document.getElementById("arquivo").value;
										var img = document.getElementById("arquivo").value;
										var legenda = document.getElementById("legenda").value;
										
										if(template == 0 || imagem == "" || legenda == ""){
											document.getElementById('info').innerHTML = '<p>Você deve preencher todos os campos!</p>'; 
									        $('#info').dialog('open'); 			

											return false;	
										}
										
										//redimensiona imagem.
										controlImagem(img, template, legenda);
										

										
   							   		}

   							   		function controlImagem(imagem, template, legenda){

	   							   		$.ajax(
	   							   			{
	   							   			  type: "POST",
	   							   			  url: "<?php echo $mainFolder; ?>/mediaplus/controller/imagemcontroller",
	   							   			  //
	   							   			  data: "imagem="+imagem+"&template="+template+"&largura_img_all="+largura_img_all+"&largura_img_left="+largura_img_left,
	   							   			  beforeSend: function() {
	   							   	 			//carregando
	   							   			  },
	   							   			  success: function(txt) {
		   							   			//retorno
		   							   			/*
		   							   			 * 0 true : sucesso - false : falha
		   							   			 * 1 mensagem de erro ou sucesso
		   							   			 * 2 largura
		   							   			 * 3 altura
		   							   			 * 4 tem ou nao popup
		   							   			 * 5 nome imagem
		   							   			 *
		   							   			 */
		   										//alert(txt);
		   										resp = txt.split("*");
		   										//alert(resp[0]);
		   										if(resp[0] == 'false'){
		   							   			    document.getElementById('info').innerHTML = '<p>'+resp[1]+'</p>';
		   							   	            $('#info').dialog('open'); 	
		   							   	            retorno = "err";
	   							   			  	}else{

			   							   			  	document.getElementById("arquivo").value = resp[5];
			  											imagem = "<?php echo $mainFolder; ?>/uploads/imagem_arquivo/" + resp[5];
			  											img = resp[5];
			  											w = resp[2];
			  											h = resp[3];
			  											popup = resp[4];
														
														if(document.getElementById("situacao").value == "save"){
															
				  											if(template == 1){
					  											if(popup == "no-popup"){
				  													html = "<div id='"+imagem+"' style='float:left; margin:10px; margin-left:0; margin-top:5px; width:"+w+"px;'><img name='"+img+"' title='"+legenda+"' alt='"+legenda+"' class='"+template+"' src='"+imagem+"' width='"+w+"' height='"+h+"' style='float:left;' /><div style='float:left; background:#E9E9E3; width:"+w+"px;'><div style='padding:10px; float:left; font-size:12px; color:#000; line-height:15px;'>"+legenda+"</div></div></div><p style='text-align: left;'>&nbsp;</p>";
					  											}else if(popup == "yes-popup"){
						  											var mainFolder = "<?php echo $mainFolder; ?>";
					  												html = "<div id='"+imagem+"' style='float:left; margin:10px; margin-left:0; margin-top:5px; width:"+w+"px;'><a title='"+legenda+"' class='lightbox' href='"+mainFolder+"/uploads/imagem_arquivo/gde_"+img+"' ><img src='"+mainFolder+"/includes/images/ico-ampliar-foto.gif' style='float:right; border:none;' /><img name='"+img+"' title='"+legenda+"' alt='"+legenda+"' class='"+template+"' src='"+imagem+"' width='"+w+"' height='"+h+"' style='float:left;  border:none;' /></a><div style='float:left; background:#E9E9E3; width:"+w+"px;'><div style='padding:10px; float:left; font-size:12px; color:#000; line-height:15px;'>"+legenda+"</div></div></div><p style='text-align: left;'>&nbsp;</p>";				
					  											 }	 
				  											}else if(template == 3){
				  												if(popup == "no-popup"){
				  													html = "<div id='"+imagem+"' style='float:left; margin-top:10px; margin-bottom:5px; width:"+w+"px;'><img name='"+img+"' title='"+legenda+"' alt='"+legenda+"' class='"+template+"' src='"+imagem+"' width='"+w+"' height='"+h+"' style='float:left;' /><div style='float:left; background:#E9E9E3; width:"+w+"px;'><div style='padding:10px; float:left; font-size:12px; color:#000; line-height:15px;'>"+legenda+"</div></div></div><p style='text-align: left;'>&nbsp;</p>";
				  												}else if(popup == "yes-popup"){
				  													var mainFolder = "<?php echo $mainFolder; ?>";
				  													html = "<div id='"+imagem+"' style='float:left; margin-top:10px; margin-bottom:5px; width:"+w+"px;'><a title='"+legenda+"' class='lightbox' href='"+mainFolder+"/uploads/imagem_arquivo/gde_"+img+"' ><img src='"+mainFolder+"/includes/images/ico-ampliar-foto.gif' style='float:right; border:none;' /><img name='"+img+"' title='"+legenda+"' alt='"+legenda+"' class='"+template+"' src='"+imagem+"' width='"+w+"' height='"+h+"' style='float:left; border:none;' /></a><div style='float:left; background:#E9E9E3; width:"+w+"px;'><div style='padding:10px; float:left; font-size:12px; color:#000; line-height:15px;'>"+legenda+"</div></div></div><p style='text-align: left;'>&nbsp;</p>";
				  												 }	
				  											 }	

				  											if ( oEditor.mode == 'wysiwyg' ){
				  												oEditor.insertHtml( html );
				  											}
				  											 
														}else if(document.getElementById("situacao").value == "edit"){
															
																if(template == 1){
																	if(popup == "no-popup"){
					  													html = "<img name='"+img+"' title='"+legenda+"' alt='"+legenda+"' class='"+template+"' src='"+imagem+"' width='"+w+"' height='"+h+"' style='float:left;' /><div style='float:left; background:#E9E9E3; width:"+w+"px;'><div style='padding:10px; float:left; font-size:12px; color:#000; line-height:15px;'>"+legenda+"</div></div>"; 
																	}else if(popup == "yes-popup"){
																		var mainFolder = "<?php echo $mainFolder; ?>";
																		html = "<a title='"+legenda+"' class='lightbox' href='"+mainFolder+"/uploads/imagem_arquivo/gde_"+img+"' ><img src='"+mainFolder+"/includes/images/ico-ampliar-foto.gif' style='float:right; border:none;' /><img name='"+img+"' title='"+legenda+"' alt='"+legenda+"' class='"+template+"' src='"+imagem+"' width='"+w+"' height='"+h+"' style='float:left; border:none;' /></a><div style='float:left; background:#E9E9E3; width:"+w+"px;'><div style='padding:10px; float:left; font-size:12px; color:#000; line-height:15px;'>"+legenda+"</div></div>";
																	 }	

																	style = 'float:left; margin:10px; margin-left:0; margin-top:5px; width:'+w+'px;';
																	//alert(style);
																	html2 = "<p style='text-align: left;'>&nbsp;</p>";
						  										}else if(template == 3){
						  											if(popup == "no-popup"){
				  														html = "<img name='"+img+"' title='"+legenda+"' alt='"+legenda+"' class='"+template+"' src='"+imagem+"' width='"+w+"' height='"+h+"' style='float:left;' /><div style='float:left; background:#E9E9E3; width:"+w+"px;'><div style='padding:10px; float:left; font-size:12px; color:#000; line-height:15px;'>"+legenda+"</div></div>";
						  											}else if(popup == "yes-popup"){
						  												var mainFolder = "<?php echo $mainFolder; ?>";
						  												html = "<a title='"+legenda+"' class='lightbox' href='"+mainFolder+"/uploads/imagem_arquivo/gde_"+img+"' ><img src='"+mainFolder+"/includes/images/ico-ampliar-foto.gif' style='float:right; border:none;' /><img name='"+img+"' title='"+legenda+"' alt='"+legenda+"' class='"+template+"' src='"+imagem+"' width='"+w+"' height='"+h+"' style='float:left; border:none;' /></a><div style='float:left; background:#E9E9E3; width:"+w+"px;'><div style='padding:10px; float:left; font-size:12px; color:#000; line-height:15px;'>"+legenda+"</div></div>";
						  											 }	

																	style = "float:left; margin-top:10px; margin-bottom:5px; width:"+w+"px;";
																	html2 =  "<p style='text-align: left;'>&nbsp;</p>";	
							  									 }	
																	
																//alert(document.getElementById("idimgdiv").value);
																document.getElementById("htmlaux").innerHTML = oEditor.getData();
																//alert(document.getElementById("idimgdiv").value);		
																_iddiv = document.getElementById("idimgdiv").value;
																_iddiv = _iddiv.replace("../../", "<?php echo $mainFolder; ?>/");
																document.getElementById(_iddiv).innerHTML = html;
																document.getElementById(_iddiv).setAttribute("style", style);
																document.getElementById(_iddiv).setAttribute("id", imagem);
																oEditor.setData( document.getElementById("htmlaux").innerHTML + html2 );
																
														 }	 	
			  											
			  											
			  											
			  											$('#imageupload').dialog('close'); 	
													
	   							   			  	 } 	
	   							   			  	 
	   							   			  },
	   							   			  error: function(txt) {
	   							   			 	document.getElementById('info').innerHTML = '<p>Ocorreu um erro inesperado!<br/>Tente novamente!</p>';
	   							   	            $('#info').dialog('open'); 
	   							   	      		retorno = "err";
	   							   			  }
	   							   			}
	   							   		);
	   							   		
   							   		}
   								</script>
   								
   								<label>
   									legenda da imagem<br/>
   									<input type="text" id="legenda" name="legenda" style="width:350px; border: 1px solid #E5E5E5; padding: 3px 0 0 7px; height: 23px; font-weight: bold;" /><br/><br/>
   								</label>
   								
   								<label>posição da imagem no texto<br/>
   								<div style="float:left; width:100%; background:#FFF;">
	   								<div id="a1" onclick="mudaTemplate('a1', 1);" style="float:left; margin:10px; padding:10px; border:1px solid #EEE;">
	   									<img src="<?php echo $mainFolder; ?>/controlplus/includes/js/ckeditor/images/left.gif"/>
	   								</div>
	   								<div id="a2" onclick="mudaTemplate('a2', 2);" style="float:left; margin:10px; padding:10px; border:1px solid #EEE; display:none;">
	   									<img src="<?php echo $mainFolder; ?>/controlplus/includes/js/ckeditor/images/right.gif"/>
	   								</div>
	   								<div id="a3" onclick="mudaTemplate('a3', 3);" style="float:left; margin:10px; padding:10px; border:1px solid #EEE;">
	   									<img src="<?php echo $mainFolder; ?>/controlplus/includes/js/ckeditor/images/center.gif"/>
	   								</div>
   								</div>
   								</label><br/><br/>
   								
   								<label>
			          			imagem
   								<div style="float:left; width:100%;">
							 	    <input type="hidden" name="arquivo" id="arquivo"  />
							 	    <input type='hidden' id='mainFolder' name='mainFolder' value='<?php echo $mainFolder; ?>'/> 
							        <div id="fileQueue_arquivo"></div>
							        <input type="file" name="uploadify_arquivo" id="uploadify_arquivo" />
							   		<input type="hidden" name="totalFiles_uploadify_arquivo" id="totalFiles_uploadify_arquivo" value="1" />
							  		<div id="fileSaves_uploadify_arquivo" class="fileSaves_uploadify_style">
							           <div id="div_img" style="display:none;">
							  				<input type="hidden" name="uploadify_arquivo_1" id="uploadify_arquivo_1"  />
							  				<img id="img_arq" src="" />
							  				<a href="javascript:document.getElementById('div_img').innerHTML=''; document.getElementById('div_img').style.display='none'; jQuery('#uploadify').mpDeleteFile('uploadify_arquivo');"><img title='Excluir' alt='Excluir' class='del' src='<?php echo $mainFolder; ?>/controlplus/includes/imgs/icon_del.gif'/></a>
							            </div>
							            <input type="hidden" name="cont_uploadify_arquivo" id="cont_uploadify_arquivo" value="0" />
							  		</div>
							 	<br/><br/><br/>
							  </div>
							  </label>
							  
							  <input type='button' name='botEnviar2' id='botEnviar2' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_salvar.gif) no-repeat; width:101px; height:36px; border:none; float:left;' onclick="addImagem();" />
				</form>
   </div>
   <div id='info' title='controlplus - informação'></div>
    <form id="formDel_Produtofoto" name="formDel_Produtofoto" action="<?php echo $mainFolder; ?>/mediaplus/controller/mpcontroller" method="post" accept-charset="utf-8">
		<input type="hidden" name="classe" id="classe_Produtofoto" value="ProdutofotoController" />
		<input type="hidden" name="acao" id="acao_Produtofoto" value="excluir" />
		<input type="hidden" name="objeto" id="objeto_Produtofoto" value="Produtofoto" />
		<input type="hidden" name="idPkey" id="idPkey_Produtofoto" value="" />
  		<input type="hidden" name="idElemDel" id="idElemDel_Produtofoto" value="" />
	</form>

	<div id="confirmDel_Produtofoto" title="controlplus - confirmação"> 
		<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Tem certeza que deseja excluir este registro?</p>
	</div>

</div>
<!-- end conteudo -->
<?php include('template/bottom.php'); ?> 
