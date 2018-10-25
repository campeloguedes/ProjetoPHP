<?php include('template/config-init.php'); ?> 
<?php 
 require('controller/DestaqueController.class.php');  
 $destaqueController = new DestaqueController();  

 if(isset($idMP)){

    $destaque =  $destaqueController->listarPorId($idMP); 
   

 }else{   
  $destaque = new Destaque();   
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
               titulo: { 
                   required: true, 
                   maxlength: 255 
               }, 

               url: { 
                   required: true, 
                   url: true, 
                   maxlength: 255 
               }, 

               arquivo: { 
                   required: true, 
                   maxlength: 123 
               }, 

               posicao: { 
                   required: true, 
                   number: true 
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
         document.getElementById('fileSaves_uploadify_arquivo').innerHTML = '<input type=\'hidden\' name=\'cont_uploadify_arquivo\' id=\'cont_uploadify_arquivo\' value=\'0\' />';
         document.getElementById('arquivo').value = '';
         if(document.getElementById('uploadify_arquivo_disable') != null)           document.getElementById('uploadify_arquivo_disable').setAttribute('id', 'uploadify_arquivo');
		 $('#formCad').resetForm();
         document.getElementById('info').innerHTML = '<p>Salvo com sucesso!</p>'; 
         $('#info').dialog('open'); 
		  window.location = '<?php echo $mainFolder; ?>/controlplus/orderDestaque';
	   }
	   if(data==2){
         document.getElementById('info').innerHTML = '<p>Salvo com sucesso!</p>'; 
         $('#info').dialog('open'); 
		  window.location = '<?php echo $mainFolder; ?>/controlplus/cadDestaque/<?php echo isset($idMP) ? $idMP : ''; ?>';
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
		$('#uploadify_arquivo').uploadify({ 
			'uploader'       : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.swf',
			'script'         : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.php',
			'cancelImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/images/cancel.png',
			'buttonImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_add_file.png',
			'folder'         : '<?php echo $mainFolder; ?>/uploads/destaque_arquivo',
			'scriptData'     : {'arquivo_name_file' : '<?php echo $name_file; ?>', 'arquivo_width_1' : '0', 'arquivo_height_1' : '0', 'arquivo_width_file_2' : '0', 'arquivo_height_file_2' : '0', 'arquivo_width_file_3' : '0', 'arquivo_height_file_3' : '0', 'arquivo_width_file_4' : '0', 'arquivo_height_file_4' : '0', 'arquivo_width_file_5' : '0', 'arquivo_height_file_5' : '0'},
			'queueID'        : 'fileQueue_arquivo',
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
		<span class='title'>Destaque</span> 
		<img src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/seta_indic.gif" alt='Info' /> 
		<span class='sub_title'>Cadastro De Destaque</span> 
   </div>

 <br clear='all' /> 

   <div id='Form'>
   <form class='formular' id='formCad' name='formCad' action='<?php echo $mainFolder; ?>/mediaplus/controller/mpcontroller' method='post' accept-charset='utf-8'>

       <input type='hidden' name='classe' id='classe' value='DestaqueController' />
       <input type='hidden' name='acao' id='acao' value='salvar' />
       <input type='hidden' name='objeto' id='objeto' value='Destaque' />

       <input type='hidden' id='iddestaque' name='iddestaque' value='<?php echo $destaque->iddestaque; ?>' />

       <label>
       	   Título:<br/>
       	   <input type='text' name='titulo' id='titulo' value='<?php echo $destaque->titulo; ?>' /><br/><br/>
       </label>

       <label>
       	   URL:<br/>
       	   <input type='text' name='url' id='url' value='<?php echo $destaque->url; ?>' /><br/><br/>
       </label>

<!-- ******************************************************************************* -->
       <div style='float:left; width:100%;'>
          Arquivo (1920x400):<br/>
	   		<input type='hidden' name='arquivo' id='arquivo' value='<?php echo $destaque->arquivo; ?>' />
			<input type='hidden' id='mainFolder' name='mainFolder' value='<?php echo $mainFolder; ?>'/>
            <input type='hidden' id='uploadify_arquivo_nameFile' name='uploadify_arquivo_nameFile' value='<?php echo $name_file; ?>'/>            <div id='fileQueue_arquivo'></div>
            <input type='file' name='uploadify_arquivo' id='uploadify_arquivo' />
	   		<input type='hidden' name='totalFiles_uploadify_arquivo' id='totalFiles_uploadify_arquivo' value='1' />
 	   		<div id='fileSaves_uploadify_arquivo' class='fileSaves_uploadify_style'>
                <?php if($destaque->arquivo!=''){  ?>
		   			<input type='hidden' name='cont_uploadify_arquivo' id='cont_uploadify_arquivo' value='1' />
					<div id='div_arquivo'>
						<input type='hidden' name='uploadify_arquivo_1' id='uploadify_arquivo_1' value='<?php echo $destaque->arquivo ?>' />
						<?php if(is_img($destaque->arquivo)){ ?><img src='<?php echo $mainFolder; ?>/uploads/destaque_arquivo/<?php echo $destaque->arquivo; ?>' /><?php }else{ ?> <a href='<?php echo $mainFolder; ?>/uploads/destaque_arquivo/<?php echo $destaque->arquivo; ?>' target='_blank'><?php echo $destaque->arquivo; ?></a> <?php } ?>
						<a href="javascript:document.getElementById('arquivo').value = ''; document.getElementById('div_arquivo').innerHTML=''; document.getElementById('div_arquivo').style.display='none'; jQuery('#uploadify').mpDeleteFile('uploadify_arquivo'); "><img title='Excluir' alt='Excluir' class='del' src='<?php echo $mainFolder; ?>/controlplus/includes/imgs/icon_del.gif'/></a>
                    </div>
                <?php }else{ ?>
                	<input type='hidden' name='cont_uploadify_arquivo' id='cont_uploadify_arquivo' value='0' />
                <?php } ?>	   		</div>
       </div><br/>

<!-- ******************************************************************************* -->
       	   <input type='hidden' name='posicao' id='posicao' value='<?php echo $destaque->posicao == '' ? 0 : $destaque->posicao; ?>' />
       <br/>
		<div class='area_btns'>
			<input type='submit'  style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_salvar.gif) no-repeat; width:101px; height:36px;' class='btn1' alt='Salvar' value='' />
			<input type='button' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_cancelar.gif) no-repeat; width:101px; height:36px;' class='btn2' alt='Cancelar' value='' onclick="window.location='<?php echo $mainFolder; ?>/controlplus/listDestaque'" />
           <img style="float:left; margin:15px;" id="cpload1" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/cpload.gif"/>
       </div>
   </form>
   </div>


   <div id='info' title='controlplus - informação'></div>
</div>
<!-- end conteudo -->
<?php include('template/bottom.php'); ?> 
