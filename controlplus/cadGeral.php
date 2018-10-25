<?php include('template/config-init.php'); ?> 
<?php $idMP = 1; ?> 
<?php 
 require('controller/GeralController.class.php');  
 $geralController = new GeralController();  

 if(isset($idMP)){

    $geral =  $geralController->listarPorId($idMP); 
 if(!isset($geral->idgeral)){ $geral = new Geral(); } 
  

 }else{   
  $geral = new Geral();   
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
               email: { 
                   required: true, 
                   email: true, 
                   maxlength: 255 
               }, 

               telefone: { 
                   required: true, 
                   maxlength: 255 
               }, 

               urlfacebook: { 
                   required: false, 
                   maxlength: 255 
               }, 

               urltwitter: { 
                   required: false, 
                   maxlength: 255 
               }, 

               urlinstagram: { 
                   required: false, 
                   maxlength: 255 
               }, 

               urlyoutube: { 
                   required: false, 
                   maxlength: 255 
               }, 

               anuncinformacoes: { 
                   required: true 
               }, 

               endereco: { 
                   required: true, 
                   maxlength: 255 
               }, 

               bairro: { 
                   required: true, 
                   maxlength: 255 
               }, 

               cidade: { 
                   required: true, 
                   maxlength: 255 
               }, 

               googlemaps: { 
                   required: true 
               }, 

               objetivos: { 
                   required: true 
               }, 

               e1icone: { 
                   required: true, 
                   maxlength: 123 
               }, 

               e1titulo: { 
                   required: true, 
                   maxlength: 255 
               }, 

               e1descricao: { 
                   required: true 
               }, 

               e2icone: { 
                   required: true, 
                   maxlength: 123 
               }, 

               e2titulo: { 
                   required: true, 
                   maxlength: 255 
               }, 

               e2descricao: { 
                   required: true 
               }, 

               e3icone: { 
                   required: true, 
                   maxlength: 123 
               }, 

               e3titulo: { 
                   required: true, 
                   maxlength: 255 
               }, 

               e3descricao: { 
                   required: true 
               }, 

               e4icone: { 
                   required: true, 
                   maxlength: 123 
               }, 

               e4titulo: { 
                   required: true, 
                   maxlength: 255 
               }, 

               e4descricao: { 
                   required: true 
               }, 

               parallax: { 
                   required: true, 
                   maxlength: 123 
               }, 

               codigoanalytics: { 
                   required: false 
               }, 

               codigochat: { 
                   required: false 
               }

            } 
      }); 
  }); 

  jQuery(function($){ 
      $('#telefone').mask('9999999999?9'); 
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
         document.getElementById('fileSaves_uploadify_e1icone').innerHTML = '<input type=\'hidden\' name=\'cont_uploadify_e1icone\' id=\'cont_uploadify_e1icone\' value=\'0\' />';
         document.getElementById('e1icone').value = '';
         if(document.getElementById('uploadify_e1icone_disable') != null)           document.getElementById('uploadify_e1icone_disable').setAttribute('id', 'uploadify_e1icone');
         document.getElementById('fileSaves_uploadify_e2icone').innerHTML = '<input type=\'hidden\' name=\'cont_uploadify_e2icone\' id=\'cont_uploadify_e2icone\' value=\'0\' />';
         document.getElementById('e2icone').value = '';
         if(document.getElementById('uploadify_e2icone_disable') != null)           document.getElementById('uploadify_e2icone_disable').setAttribute('id', 'uploadify_e2icone');
         document.getElementById('fileSaves_uploadify_e3icone').innerHTML = '<input type=\'hidden\' name=\'cont_uploadify_e3icone\' id=\'cont_uploadify_e3icone\' value=\'0\' />';
         document.getElementById('e3icone').value = '';
         if(document.getElementById('uploadify_e3icone_disable') != null)           document.getElementById('uploadify_e3icone_disable').setAttribute('id', 'uploadify_e3icone');
         document.getElementById('fileSaves_uploadify_e4icone').innerHTML = '<input type=\'hidden\' name=\'cont_uploadify_e4icone\' id=\'cont_uploadify_e4icone\' value=\'0\' />';
         document.getElementById('e4icone').value = '';
         if(document.getElementById('uploadify_e4icone_disable') != null)           document.getElementById('uploadify_e4icone_disable').setAttribute('id', 'uploadify_e4icone');
         document.getElementById('fileSaves_uploadify_parallax').innerHTML = '<input type=\'hidden\' name=\'cont_uploadify_parallax\' id=\'cont_uploadify_parallax\' value=\'0\' />';
         document.getElementById('parallax').value = '';
         if(document.getElementById('uploadify_parallax_disable') != null)           document.getElementById('uploadify_parallax_disable').setAttribute('id', 'uploadify_parallax');
		 $('#formCad').resetForm();
         document.getElementById('info').innerHTML = '<p>Salvo com sucesso!</p>'; 
         $('#info').dialog('open'); 
		  window.location = '<?php echo $mainFolder; ?>/controlplus/cadGeral';
	   }
	   if(data==2){
         document.getElementById('info').innerHTML = '<p>Salvo com sucesso!</p>'; 
         $('#info').dialog('open'); 
		  window.location = '<?php echo $mainFolder; ?>/controlplus/cadGeral/<?php echo isset($idMP) ? $idMP : ''; ?>';
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
		$('#uploadify_e1icone').uploadify({ 
			'uploader'       : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.swf',
			'script'         : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.php',
			'cancelImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/images/cancel.png',
			'buttonImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_add_file.png',
			'folder'         : '<?php echo $mainFolder; ?>/uploads/geral_e1icone',
			'scriptData'     : {'e1icone_name_file' : '<?php echo $name_file; ?>', 'e1icone_width_1' : '0', 'e1icone_height_1' : '0', 'e1icone_width_file_2' : '0', 'e1icone_height_file_2' : '0', 'e1icone_width_file_3' : '0', 'e1icone_height_file_3' : '0', 'e1icone_width_file_4' : '0', 'e1icone_height_file_4' : '0', 'e1icone_width_file_5' : '0', 'e1icone_height_file_5' : '0'},
			'queueID'        : 'fileQueue_e1icone',
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
		$('#uploadify_e2icone').uploadify({ 
			'uploader'       : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.swf',
			'script'         : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.php',
			'cancelImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/images/cancel.png',
			'buttonImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_add_file.png',
			'folder'         : '<?php echo $mainFolder; ?>/uploads/geral_e2icone',
			'scriptData'     : {'e2icone_name_file' : '<?php echo $name_file; ?>', 'e2icone_width_1' : '0', 'e2icone_height_1' : '0', 'e2icone_width_file_2' : '0', 'e2icone_height_file_2' : '0', 'e2icone_width_file_3' : '0', 'e2icone_height_file_3' : '0', 'e2icone_width_file_4' : '0', 'e2icone_height_file_4' : '0', 'e2icone_width_file_5' : '0', 'e2icone_height_file_5' : '0'},
			'queueID'        : 'fileQueue_e2icone',
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
		$('#uploadify_e3icone').uploadify({ 
			'uploader'       : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.swf',
			'script'         : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.php',
			'cancelImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/images/cancel.png',
			'buttonImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_add_file.png',
			'folder'         : '<?php echo $mainFolder; ?>/uploads/geral_e3icone',
			'scriptData'     : {'e3icone_name_file' : '<?php echo $name_file; ?>', 'e3icone_width_1' : '0', 'e3icone_height_1' : '0', 'e3icone_width_file_2' : '0', 'e3icone_height_file_2' : '0', 'e3icone_width_file_3' : '0', 'e3icone_height_file_3' : '0', 'e3icone_width_file_4' : '0', 'e3icone_height_file_4' : '0', 'e3icone_width_file_5' : '0', 'e3icone_height_file_5' : '0'},
			'queueID'        : 'fileQueue_e3icone',
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
		$('#uploadify_e4icone').uploadify({ 
			'uploader'       : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.swf',
			'script'         : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.php',
			'cancelImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/images/cancel.png',
			'buttonImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_add_file.png',
			'folder'         : '<?php echo $mainFolder; ?>/uploads/geral_e4icone',
			'scriptData'     : {'e4icone_name_file' : '<?php echo $name_file; ?>', 'e4icone_width_1' : '0', 'e4icone_height_1' : '0', 'e4icone_width_file_2' : '0', 'e4icone_height_file_2' : '0', 'e4icone_width_file_3' : '0', 'e4icone_height_file_3' : '0', 'e4icone_width_file_4' : '0', 'e4icone_height_file_4' : '0', 'e4icone_width_file_5' : '0', 'e4icone_height_file_5' : '0'},
			'queueID'        : 'fileQueue_e4icone',
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
		$('#uploadify_parallax').uploadify({ 
			'uploader'       : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.swf',
			'script'         : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.php',
			'cancelImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/images/cancel.png',
			'buttonImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_add_file.png',
			'folder'         : '<?php echo $mainFolder; ?>/uploads/geral_parallax',
			'scriptData'     : {'parallax_name_file' : '<?php echo $name_file; ?>', 'parallax_width_1' : '0', 'parallax_height_1' : '0', 'parallax_width_file_2' : '0', 'parallax_height_file_2' : '0', 'parallax_width_file_3' : '0', 'parallax_height_file_3' : '0', 'parallax_width_file_4' : '0', 'parallax_height_file_4' : '0', 'parallax_width_file_5' : '0', 'parallax_height_file_5' : '0'},
			'queueID'        : 'fileQueue_parallax',
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
		<span class='title'>Geral</span> 
		<img src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/seta_indic.gif" alt='Info' /> 
		<span class='sub_title'>Cadastro De Geral</span> 
   </div>

 <br clear='all' /> 

   <div id='Form'>
   <form class='formular' id='formCad' name='formCad' action='<?php echo $mainFolder; ?>/mediaplus/controller/mpcontroller' method='post' accept-charset='utf-8'>

       <input type='hidden' name='classe' id='classe' value='GeralController' />
       <input type='hidden' name='acao' id='acao' value='salvar' />
       <input type='hidden' name='objeto' id='objeto' value='Geral' />

       <input type='hidden' id='idgeral' name='idgeral' value='<?php echo $geral->idgeral; ?>' />

       <label>
       	   E-mail:<br/>
       	   <input type='text' name='email' id='email' value='<?php echo $geral->email; ?>' /><br/><br/>
       </label>

       <label>
       	   Telefone:<br/>
       	   <input type='text' name='telefone' id='telefone' value='<?php echo $geral->telefone; ?>' /><br/><br/>
       </label>

       <label>
       	   URL Do Facebook:<br/>
       	   <input type='text' name='urlfacebook' id='urlfacebook' value='<?php echo $geral->urlfacebook; ?>' /><br/><br/>
       </label>

       <label>
       	   URL Do Twitter:<br/>
       	   <input type='text' name='urltwitter' id='urltwitter' value='<?php echo $geral->urltwitter; ?>' /><br/><br/>
       </label>

       <label>
       	   URL Do Instagram:<br/>
       	   <input type='text' name='urlinstagram' id='urlinstagram' value='<?php echo $geral->urlinstagram; ?>' /><br/><br/>
       </label>

       <label>
       	   URL Do Youtube:<br/>
       	   <input type='text' name='urlyoutube' id='urlyoutube' value='<?php echo $geral->urlyoutube; ?>' /><br/><br/>
       </label>

       <label>
       	   Anuncie (Informações):<br/>
       	   <textarea name='anuncinformacoes' id='anuncinformacoes'><?php echo $geral->anuncinformacoes; ?></textarea><br/><br/>
       </label>

       <label>
       	   Endereço:<br/>
       	   <input type='text' name='endereco' id='endereco' value='<?php echo $geral->endereco; ?>' /><br/><br/>
       </label>

       <label>
       	   Bairro:<br/>
       	   <input type='text' name='bairro' id='bairro' value='<?php echo $geral->bairro; ?>' /><br/><br/>
       </label>

       <label>
       	   Cidade:<br/>
       	   <input type='text' name='cidade' id='cidade' value='<?php echo $geral->cidade; ?>' /><br/><br/>
       </label>

       <label>
       	   GoogleMaps (Código De Incorporação):<br/>
       	   <textarea name='googlemaps' id='googlemaps'><?php echo $geral->googlemaps; ?></textarea><br/><br/>
       </label>

       <label>
       	   Objetivos E Responsabilidade Do Site:<br/>
       	   <textarea name='objetivos' id='objetivos'><?php echo $geral->objetivos; ?></textarea><br/><br/>
       </label>

<!-- ******************************************************************************* -->
       <div style='float:left; width:100%;'>
          Etapa 1 (Ícone):<br/>
	   		<input type='hidden' name='e1icone' id='e1icone' value='<?php echo $geral->e1icone; ?>' />
			<input type='hidden' id='mainFolder' name='mainFolder' value='<?php echo $mainFolder; ?>'/>
            <input type='hidden' id='uploadify_e1icone_nameFile' name='uploadify_e1icone_nameFile' value='<?php echo $name_file; ?>'/>            <div id='fileQueue_e1icone'></div>
            <input type='file' name='uploadify_e1icone' id='uploadify_e1icone' />
	   		<input type='hidden' name='totalFiles_uploadify_e1icone' id='totalFiles_uploadify_e1icone' value='1' />
 	   		<div id='fileSaves_uploadify_e1icone' class='fileSaves_uploadify_style'>
                <?php if($geral->e1icone!=''){  ?>
		   			<input type='hidden' name='cont_uploadify_e1icone' id='cont_uploadify_e1icone' value='1' />
					<div id='div_e1icone'>
						<input type='hidden' name='uploadify_e1icone_1' id='uploadify_e1icone_1' value='<?php echo $geral->e1icone ?>' />
						<?php if(is_img($geral->e1icone)){ ?><img src='<?php echo $mainFolder; ?>/uploads/geral_e1icone/<?php echo $geral->e1icone; ?>' /><?php }else{ ?> <a href='<?php echo $mainFolder; ?>/uploads/geral_e1icone/<?php echo $geral->e1icone; ?>' target='_blank'><?php echo $geral->e1icone; ?></a> <?php } ?>
						<a href="javascript:document.getElementById('e1icone').value = ''; document.getElementById('div_e1icone').innerHTML=''; document.getElementById('div_e1icone').style.display='none'; jQuery('#uploadify').mpDeleteFile('uploadify_e1icone'); "><img title='Excluir' alt='Excluir' class='del' src='<?php echo $mainFolder; ?>/controlplus/includes/imgs/icon_del.gif'/></a>
                    </div>
                <?php }else{ ?>
                	<input type='hidden' name='cont_uploadify_e1icone' id='cont_uploadify_e1icone' value='0' />
                <?php } ?>	   		</div>
       </div><br/>

<!-- ******************************************************************************* -->
       <label>
       	   Etapa 1 (Título):<br/>
       	   <input type='text' name='e1titulo' id='e1titulo' value='<?php echo $geral->e1titulo; ?>' /><br/><br/>
       </label>

       <label>
       	   Etapa 1 (Descrição):<br/>
       	   <textarea name='e1descricao' id='e1descricao'><?php echo $geral->e1descricao; ?></textarea><br/><br/>
       </label>

<!-- ******************************************************************************* -->
       <div style='float:left; width:100%;'>
          Etapa 2 (Ícone):<br/>
	   		<input type='hidden' name='e2icone' id='e2icone' value='<?php echo $geral->e2icone; ?>' />
			<input type='hidden' id='mainFolder' name='mainFolder' value='<?php echo $mainFolder; ?>'/>
            <input type='hidden' id='uploadify_e2icone_nameFile' name='uploadify_e2icone_nameFile' value='<?php echo $name_file; ?>'/>            <div id='fileQueue_e2icone'></div>
            <input type='file' name='uploadify_e2icone' id='uploadify_e2icone' />
	   		<input type='hidden' name='totalFiles_uploadify_e2icone' id='totalFiles_uploadify_e2icone' value='1' />
 	   		<div id='fileSaves_uploadify_e2icone' class='fileSaves_uploadify_style'>
                <?php if($geral->e2icone!=''){  ?>
		   			<input type='hidden' name='cont_uploadify_e2icone' id='cont_uploadify_e2icone' value='1' />
					<div id='div_e2icone'>
						<input type='hidden' name='uploadify_e2icone_1' id='uploadify_e2icone_1' value='<?php echo $geral->e2icone ?>' />
						<?php if(is_img($geral->e2icone)){ ?><img src='<?php echo $mainFolder; ?>/uploads/geral_e2icone/<?php echo $geral->e2icone; ?>' /><?php }else{ ?> <a href='<?php echo $mainFolder; ?>/uploads/geral_e2icone/<?php echo $geral->e2icone; ?>' target='_blank'><?php echo $geral->e2icone; ?></a> <?php } ?>
						<a href="javascript:document.getElementById('e2icone').value = ''; document.getElementById('div_e2icone').innerHTML=''; document.getElementById('div_e2icone').style.display='none'; jQuery('#uploadify').mpDeleteFile('uploadify_e2icone'); "><img title='Excluir' alt='Excluir' class='del' src='<?php echo $mainFolder; ?>/controlplus/includes/imgs/icon_del.gif'/></a>
                    </div>
                <?php }else{ ?>
                	<input type='hidden' name='cont_uploadify_e2icone' id='cont_uploadify_e2icone' value='0' />
                <?php } ?>	   		</div>
       </div><br/>

<!-- ******************************************************************************* -->
       <label>
       	   Etapa 2 (Título):<br/>
       	   <input type='text' name='e2titulo' id='e2titulo' value='<?php echo $geral->e2titulo; ?>' /><br/><br/>
       </label>

       <label>
       	   Etapa 2 (Descrição):<br/>
       	   <textarea name='e2descricao' id='e2descricao'><?php echo $geral->e2descricao; ?></textarea><br/><br/>
       </label>

<!-- ******************************************************************************* -->
       <div style='float:left; width:100%;'>
          Etapa 3 (Ícone):<br/>
	   		<input type='hidden' name='e3icone' id='e3icone' value='<?php echo $geral->e3icone; ?>' />
			<input type='hidden' id='mainFolder' name='mainFolder' value='<?php echo $mainFolder; ?>'/>
            <input type='hidden' id='uploadify_e3icone_nameFile' name='uploadify_e3icone_nameFile' value='<?php echo $name_file; ?>'/>            <div id='fileQueue_e3icone'></div>
            <input type='file' name='uploadify_e3icone' id='uploadify_e3icone' />
	   		<input type='hidden' name='totalFiles_uploadify_e3icone' id='totalFiles_uploadify_e3icone' value='1' />
 	   		<div id='fileSaves_uploadify_e3icone' class='fileSaves_uploadify_style'>
                <?php if($geral->e3icone!=''){  ?>
		   			<input type='hidden' name='cont_uploadify_e3icone' id='cont_uploadify_e3icone' value='1' />
					<div id='div_e3icone'>
						<input type='hidden' name='uploadify_e3icone_1' id='uploadify_e3icone_1' value='<?php echo $geral->e3icone ?>' />
						<?php if(is_img($geral->e3icone)){ ?><img src='<?php echo $mainFolder; ?>/uploads/geral_e3icone/<?php echo $geral->e3icone; ?>' /><?php }else{ ?> <a href='<?php echo $mainFolder; ?>/uploads/geral_e3icone/<?php echo $geral->e3icone; ?>' target='_blank'><?php echo $geral->e3icone; ?></a> <?php } ?>
						<a href="javascript:document.getElementById('e3icone').value = ''; document.getElementById('div_e3icone').innerHTML=''; document.getElementById('div_e3icone').style.display='none'; jQuery('#uploadify').mpDeleteFile('uploadify_e3icone'); "><img title='Excluir' alt='Excluir' class='del' src='<?php echo $mainFolder; ?>/controlplus/includes/imgs/icon_del.gif'/></a>
                    </div>
                <?php }else{ ?>
                	<input type='hidden' name='cont_uploadify_e3icone' id='cont_uploadify_e3icone' value='0' />
                <?php } ?>	   		</div>
       </div><br/>

<!-- ******************************************************************************* -->
       <label>
       	   Etapa 3 (Título):<br/>
       	   <input type='text' name='e3titulo' id='e3titulo' value='<?php echo $geral->e3titulo; ?>' /><br/><br/>
       </label>

       <label>
       	   Etapa 3 (Descrição):<br/>
       	   <textarea name='e3descricao' id='e3descricao'><?php echo $geral->e3descricao; ?></textarea><br/><br/>
       </label>

<!-- ******************************************************************************* -->
       <div style='float:left; width:100%;'>
          Etapa 4 (Ícone):<br/>
	   		<input type='hidden' name='e4icone' id='e4icone' value='<?php echo $geral->e4icone; ?>' />
			<input type='hidden' id='mainFolder' name='mainFolder' value='<?php echo $mainFolder; ?>'/>
            <input type='hidden' id='uploadify_e4icone_nameFile' name='uploadify_e4icone_nameFile' value='<?php echo $name_file; ?>'/>            <div id='fileQueue_e4icone'></div>
            <input type='file' name='uploadify_e4icone' id='uploadify_e4icone' />
	   		<input type='hidden' name='totalFiles_uploadify_e4icone' id='totalFiles_uploadify_e4icone' value='1' />
 	   		<div id='fileSaves_uploadify_e4icone' class='fileSaves_uploadify_style'>
                <?php if($geral->e4icone!=''){  ?>
		   			<input type='hidden' name='cont_uploadify_e4icone' id='cont_uploadify_e4icone' value='1' />
					<div id='div_e4icone'>
						<input type='hidden' name='uploadify_e4icone_1' id='uploadify_e4icone_1' value='<?php echo $geral->e4icone ?>' />
						<?php if(is_img($geral->e4icone)){ ?><img src='<?php echo $mainFolder; ?>/uploads/geral_e4icone/<?php echo $geral->e4icone; ?>' /><?php }else{ ?> <a href='<?php echo $mainFolder; ?>/uploads/geral_e4icone/<?php echo $geral->e4icone; ?>' target='_blank'><?php echo $geral->e4icone; ?></a> <?php } ?>
						<a href="javascript:document.getElementById('e4icone').value = ''; document.getElementById('div_e4icone').innerHTML=''; document.getElementById('div_e4icone').style.display='none'; jQuery('#uploadify').mpDeleteFile('uploadify_e4icone'); "><img title='Excluir' alt='Excluir' class='del' src='<?php echo $mainFolder; ?>/controlplus/includes/imgs/icon_del.gif'/></a>
                    </div>
                <?php }else{ ?>
                	<input type='hidden' name='cont_uploadify_e4icone' id='cont_uploadify_e4icone' value='0' />
                <?php } ?>	   		</div>
       </div><br/>

<!-- ******************************************************************************* -->
       <label>
       	   Etapa 4 (Titulo):<br/>
       	   <input type='text' name='e4titulo' id='e4titulo' value='<?php echo $geral->e4titulo; ?>' /><br/><br/>
       </label>

       <label>
       	   Etapa 4 (Descrição):<br/>
       	   <textarea name='e4descricao' id='e4descricao'><?php echo $geral->e4descricao; ?></textarea><br/><br/>
       </label>

<!-- ******************************************************************************* -->
       <div style='float:left; width:100%;'>
          Foto Parallax (Etapas Home) (1920x1080):<br/>
	   		<input type='hidden' name='parallax' id='parallax' value='<?php echo $geral->parallax; ?>' />
			<input type='hidden' id='mainFolder' name='mainFolder' value='<?php echo $mainFolder; ?>'/>
            <input type='hidden' id='uploadify_parallax_nameFile' name='uploadify_parallax_nameFile' value='<?php echo $name_file; ?>'/>            <div id='fileQueue_parallax'></div>
            <input type='file' name='uploadify_parallax' id='uploadify_parallax' />
	   		<input type='hidden' name='totalFiles_uploadify_parallax' id='totalFiles_uploadify_parallax' value='1' />
 	   		<div id='fileSaves_uploadify_parallax' class='fileSaves_uploadify_style'>
                <?php if($geral->parallax!=''){  ?>
		   			<input type='hidden' name='cont_uploadify_parallax' id='cont_uploadify_parallax' value='1' />
					<div id='div_parallax'>
						<input type='hidden' name='uploadify_parallax_1' id='uploadify_parallax_1' value='<?php echo $geral->parallax ?>' />
						<?php if(is_img($geral->parallax)){ ?><img src='<?php echo $mainFolder; ?>/uploads/geral_parallax/<?php echo $geral->parallax; ?>' /><?php }else{ ?> <a href='<?php echo $mainFolder; ?>/uploads/geral_parallax/<?php echo $geral->parallax; ?>' target='_blank'><?php echo $geral->parallax; ?></a> <?php } ?>
						<a href="javascript:document.getElementById('parallax').value = ''; document.getElementById('div_parallax').innerHTML=''; document.getElementById('div_parallax').style.display='none'; jQuery('#uploadify').mpDeleteFile('uploadify_parallax'); "><img title='Excluir' alt='Excluir' class='del' src='<?php echo $mainFolder; ?>/controlplus/includes/imgs/icon_del.gif'/></a>
                    </div>
                <?php }else{ ?>
                	<input type='hidden' name='cont_uploadify_parallax' id='cont_uploadify_parallax' value='0' />
                <?php } ?>	   		</div>
       </div><br/>

<!-- ******************************************************************************* -->
       <label>
       	   Código Analytics:<br/>
       	   <textarea name='codigoanalytics' id='codigoanalytics'><?php echo $geral->codigoanalytics; ?></textarea><br/><br/>
       </label>

       <label>
       	   Código Chat:<br/>
       	   <textarea name='codigochat' id='codigochat'><?php echo $geral->codigochat; ?></textarea><br/><br/>
       </label>

       <br/>
		<div class='area_btns'>
			<input type='submit'  style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_salvar.gif) no-repeat; width:101px; height:36px;' class='btn1' alt='Salvar' value='' />
			<input type='button' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_cancelar.gif) no-repeat; width:101px; height:36px;' class='btn2' alt='Cancelar' value='' onclick="window.location='<?php echo $mainFolder; ?>/controlplus/listGeral'" />
           <img style="float:left; margin:15px;" id="cpload1" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/cpload.gif"/>
       </div>
   </form>
   </div>


   <div id='info' title='controlplus - informação'></div>
</div>
<!-- end conteudo -->
<?php include('template/bottom.php'); ?> 
