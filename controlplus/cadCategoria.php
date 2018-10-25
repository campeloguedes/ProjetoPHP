<?php include('template/config-init.php'); ?> 
<?php 
 require('controller/CategoriaController.class.php');  
 $categoriaController = new CategoriaController();  

 if(isset($idMP)){

    $categoria =  $categoriaController->listarPorId($idMP); 
   

 }else{   
  $categoria = new Categoria();   
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
               nome: { 
                   required: true, 
                   maxlength: 255 
               }, 

               icone: { 
                   required: true, 
                   maxlength: 123 
               }

            } 
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
	   if(data==1){
         document.getElementById('fileSaves_uploadify_icone').innerHTML = '<input type=\'hidden\' name=\'cont_uploadify_icone\' id=\'cont_uploadify_icone\' value=\'0\' />';
         document.getElementById('icone').value = '';
         if(document.getElementById('uploadify_icone_disable') != null)           document.getElementById('uploadify_icone_disable').setAttribute('id', 'uploadify_icone');
		 $('#formCad').resetForm();
         document.getElementById('info').innerHTML = '<p>Salvo com sucesso!</p>'; 
         $('#info').dialog('open'); 
		  window.location = '<?php echo $mainFolder; ?>/controlplus/cadCategoria';
	   }
	   if(data==2){
         document.getElementById('info').innerHTML = '<p>Salvo com sucesso!</p>'; 
         $('#info').dialog('open'); 
		  window.location = '<?php echo $mainFolder; ?>/controlplus/cadCategoria/<?php echo isset($idMP) ? $idMP : ''; ?>';
	   }
       if(data==0){
         document.getElementById('info').innerHTML = '<p>Ocorreu um erro inesperado!<br/>Verifique os dados do cadastro e tente novamente!</p>';
         $('#info').dialog('open'); 
	   }
  }

</script>

<link href='<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/css/uploadify.css' rel='stylesheet' type='text/css' />
<script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/swfobject.js'></script>
<script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/jquery.uploadify.v2.1.0.js'></script>


<?php $name_file = date('YmdHis'); ?>
<script type='text/javascript'>
	$(document).ready(function() {
		$('#uploadify_icone').uploadify({ 
			'uploader'       : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.swf',
			'script'         : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.php',
			'cancelImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/images/cancel.png',
			'buttonImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_add_file.png',
			'folder'         : '<?php echo $mainFolder; ?>/uploads/categoria_icone',
			'scriptData'     : {'icone_name_file' : '<?php echo $name_file; ?>', 'icone_width_1' : '0', 'icone_height_1' : '0', 'icone_width_file_2' : '0', 'icone_height_file_2' : '0', 'icone_width_file_3' : '0', 'icone_height_file_3' : '0', 'icone_width_file_4' : '0', 'icone_height_file_4' : '0', 'icone_width_file_5' : '0', 'icone_height_file_5' : '0'},
			'queueID'        : 'fileQueue_icone',
			'auto'           : true,
			'multi'          : false,
			'displayData'	 : 'speed',
			'fileExt'		 : '*.jpg;*.jpeg;*.gif;*.png'
		 });
	 });
</script>
<!-- end head -->

<?php include('template/top.php'); ?> 
<?php include('template/menu.php'); ?> 
<!-- conteudo -->

<div id='Content'> 
   <div class='category'>
		<span class='title'>Categoria</span> 
		<img src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/seta_indic.gif" alt='Info' /> 
		<span class='sub_title'>Cadastro De Categoria</span> 
   </div>

 <br clear='all' /> 

   <div id='Form'>
   <form class='formular' id='formCad' name='formCad' action='<?php echo $mainFolder; ?>/mediaplus/controller/mpcontroller' method='post' accept-charset='utf-8'>

       <input type='hidden' name='classe' id='classe' value='CategoriaController' />
       <input type='hidden' name='acao' id='acao' value='salvar' />
       <input type='hidden' name='objeto' id='objeto' value='Categoria' />

       <input type='hidden' id='idcategoria' name='idcategoria' value='<?php echo $categoria->idcategoria; ?>' />

       <label>
       	   Nome:<br/>
       	   <input type='text' name='nome' id='nome' value='<?php echo $categoria->nome; ?>' /><br/><br/>
       </label>

<!-- ******************************************************************************* -->
       <div style='float:left; width:100%;'>
          Ícone (Azul) 32x25:<br/>
	   		<input type='hidden' name='icone' id='icone' value='<?php echo $categoria->icone; ?>' />
			<input type='hidden' id='mainFolder' name='mainFolder' value='<?php echo $mainFolder; ?>'/>
            <input type='hidden' id='uploadify_icone_nameFile' name='uploadify_icone_nameFile' value='<?php echo $name_file; ?>'/>            <div id='fileQueue_icone'></div>
            <input type='file' name='uploadify_icone' id='uploadify_icone' />
	   		<input type='hidden' name='totalFiles_uploadify_icone' id='totalFiles_uploadify_icone' value='1' />
 	   		<div id='fileSaves_uploadify_icone' class='fileSaves_uploadify_style'>
                <?php if($categoria->icone!=''){  ?>
		   			<input type='hidden' name='cont_uploadify_icone' id='cont_uploadify_icone' value='1' />
					<div id='div_icone'>
						<input type='hidden' name='uploadify_icone_1' id='uploadify_icone_1' value='<?php echo $categoria->icone ?>' />
						<?php if(is_img($categoria->icone)){ ?><img src='<?php echo $mainFolder; ?>/uploads/categoria_icone/<?php echo $categoria->icone; ?>' /><?php }else{ ?> <a href='<?php echo $mainFolder; ?>/uploads/categoria_icone/<?php echo $categoria->icone; ?>' target='_blank'><?php echo $categoria->icone; ?></a> <?php } ?>
						<a href="javascript:document.getElementById('icone').value = ''; document.getElementById('div_icone').innerHTML=''; document.getElementById('div_icone').style.display='none'; jQuery('#uploadify').mpDeleteFile('uploadify_icone'); "><img title='Excluir' alt='Excluir' class='del' src='<?php echo $mainFolder; ?>/controlplus/includes/imgs/icon_del.gif'/></a>
                    </div>
                <?php }else{ ?>
                	<input type='hidden' name='cont_uploadify_icone' id='cont_uploadify_icone' value='0' />
                <?php } ?>	   		</div>
       </div><br/>

<!-- ******************************************************************************* -->
       <br/>
		<div class='area_btns'>
			<input type='submit'  style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_salvar.gif) no-repeat; width:101px; height:36px;' class='btn1' alt='Salvar' value='' />
			<input type='button' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_cancelar.gif) no-repeat; width:101px; height:36px;' class='btn2' alt='Cancelar' value='' onclick="window.location='<?php echo $mainFolder; ?>/controlplus/listCategoria'" />
           <img style="float:left; margin:15px;" id="cpload1" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/cpload.gif"/>
       </div>
   </form>
   </div>


   <div id='info' title='controlplus - informação'></div>
</div>
<!-- end conteudo -->
<?php include('template/bottom.php'); ?> 
