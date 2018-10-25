<?php include('template/config-init.php'); ?> 
<?php 
 require('controller/AnuncianteController.class.php');  
 $anuncianteController = new AnuncianteController();  

 if(isset($idMP)){

    $anunciante =  $anuncianteController->listarPorId($idMP); 
   

 }else{   
  $anunciante = new Anunciante();   
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

               telefone: { 
                   required: true, 
                   maxlength: 255 
               }, 

               whatsapp: { 
                   required: true, 
                   maxlength: 255 
               }, 

               email: { 
                   required: true, 
                   email: true, 
                   maxlength: 255 
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

               logotipo: { 
                   required: true, 
                   maxlength: 123 
               }, 

               sexo: { 
                   required: false, 
                   maxlength: 255 
               }, 

               cpf: { 
                   required: false, 
                   maxlength: 255 
               }, 

               fantasia: { 
                   required: false, 
                   maxlength: 255 
               }, 

               cnpj: { 
                   required: false, 
                   maxlength: 255 
               }, 

               telefone1: { 
                   required: false, 
                   maxlength: 255 
               }, 

               telefone2: { 
                   required: false, 
                   maxlength: 255 
               }, 

               telefone3: { 
                   required: false, 
                   maxlength: 255 
               }, 

               oqueproduz: { 
                   required: false 
               }, 

               realizaentrega: { 
                   required: false 
               }, 

               formasdepagamento: { 
                   required: false 
               }, 

               atendeligacoes: { 
                   required: false 
               }, 

               frequenciaemail: { 
                   required: false, 
                   maxlength: 255 
               }, 

               autorizaosebrae: { 
                   required: false 
               }, 

               liberado: { 
                   required: false 
               }

            } 
      }); 
  }); 

  jQuery(function($){ 
      $('#telefone').mask('9999999999?9'); 
      $('#whatsapp').mask('9999999999?9'); 
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
         document.getElementById('fileSaves_uploadify_logotipo').innerHTML = '<input type=\'hidden\' name=\'cont_uploadify_logotipo\' id=\'cont_uploadify_logotipo\' value=\'0\' />';
         document.getElementById('logotipo').value = '';
         if(document.getElementById('uploadify_logotipo_disable') != null)           document.getElementById('uploadify_logotipo_disable').setAttribute('id', 'uploadify_logotipo');
		 $('#formCad').resetForm();
         document.getElementById('info').innerHTML = '<p>Salvo com sucesso!</p>'; 
         $('#info').dialog('open'); 
		  window.location = '<?php echo $mainFolder; ?>/controlplus/cadAnunciante';
	   }
	   if(data==2){
         document.getElementById('info').innerHTML = '<p>Salvo com sucesso!</p>'; 
         $('#info').dialog('open'); 
		  window.location = '<?php echo $mainFolder; ?>/controlplus/cadAnunciante/<?php echo isset($idMP) ? $idMP : ''; ?>';
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
		$('#uploadify_logotipo').uploadify({ 
			'uploader'       : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.swf',
			'script'         : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/scripts/uploadify.php',
			'cancelImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/js/uploadify/images/cancel.png',
			'buttonImg'      : '<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_add_file.png',
			'folder'         : '<?php echo $mainFolder; ?>/uploads/anunciante_logotipo',
			'scriptData'     : {'logotipo_name_file' : '<?php echo $name_file; ?>', 'logotipo_width_1' : '0', 'logotipo_height_1' : '0', 'logotipo_width_file_2' : '0', 'logotipo_height_file_2' : '0', 'logotipo_width_file_3' : '0', 'logotipo_height_file_3' : '0', 'logotipo_width_file_4' : '0', 'logotipo_height_file_4' : '0', 'logotipo_width_file_5' : '0', 'logotipo_height_file_5' : '0'},
			'queueID'        : 'fileQueue_logotipo',
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
		<span class='title'>Anunciante</span> 
		<img src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/seta_indic.gif" alt='Info' /> 
		<span class='sub_title'>Cadastro De Anunciante</span> 
   </div>

 <br clear='all' /> 

   <div id='Form'>
   <form class='formular' id='formCad' name='formCad' action='<?php echo $mainFolder; ?>/mediaplus/controller/mpcontroller' method='post' accept-charset='utf-8'>

       <input type='hidden' name='classe' id='classe' value='AnuncianteController' />
       <input type='hidden' name='acao' id='acao' value='salvar' />
       <input type='hidden' name='objeto' id='objeto' value='Anunciante' />

       <input type='hidden' id='idanunciante' name='idanunciante' value='<?php echo $anunciante->idanunciante; ?>' />

       <label>
       	   Título:<br/>
       	   <input type='text' name='titulo' id='titulo' value='<?php echo $anunciante->titulo; ?>' /><br/><br/>
       </label>

       <label>
       	   Telefone:<br/>
       	   <input type='text' name='telefone' id='telefone' value='<?php echo $anunciante->telefone; ?>' /><br/><br/>
       </label>

       <label>
       	   Whatsapp:<br/>
       	   <input type='text' name='whatsapp' id='whatsapp' value='<?php echo $anunciante->whatsapp; ?>' /><br/><br/>
       </label>

       <label>
       	   E-mail:<br/>
       	   <input type='text' name='email' id='email' value='<?php echo $anunciante->email; ?>' /><br/><br/>
       </label>

       <label>
       	   Endereço:<br/>
       	   <input type='text' name='endereco' id='endereco' value='<?php echo $anunciante->endereco; ?>' /><br/><br/>
       </label>

       <label>
       	   Bairro:<br/>
       	   <input type='text' name='bairro' id='bairro' value='<?php echo $anunciante->bairro; ?>' /><br/><br/>
       </label>

       <label>
       	   Cidade:<br/>
       	   <input type='text' name='cidade' id='cidade' value='<?php echo $anunciante->cidade; ?>' /><br/><br/>
       </label>

       <label>
       	   Googlemaps (Código De Incorporação):<br/>
       	   <textarea name='googlemaps' id='googlemaps'><?php echo $anunciante->googlemaps; ?></textarea><br/><br/>
       </label>

<!-- ******************************************************************************* -->
       <div style='float:left; width:100%;'>
          Logotipo (65x55):<br/>
	   		<input type='hidden' name='logotipo' id='logotipo' value='<?php echo $anunciante->logotipo; ?>' />
			<input type='hidden' id='mainFolder' name='mainFolder' value='<?php echo $mainFolder; ?>'/>
            <input type='hidden' id='uploadify_logotipo_nameFile' name='uploadify_logotipo_nameFile' value='<?php echo $name_file; ?>'/>            <div id='fileQueue_logotipo'></div>
            <input type='file' name='uploadify_logotipo' id='uploadify_logotipo' />
	   		<input type='hidden' name='totalFiles_uploadify_logotipo' id='totalFiles_uploadify_logotipo' value='1' />
 	   		<div id='fileSaves_uploadify_logotipo' class='fileSaves_uploadify_style'>
                <?php if($anunciante->logotipo!=''){  ?>
		   			<input type='hidden' name='cont_uploadify_logotipo' id='cont_uploadify_logotipo' value='1' />
					<div id='div_logotipo'>
						<input type='hidden' name='uploadify_logotipo_1' id='uploadify_logotipo_1' value='<?php echo $anunciante->logotipo ?>' />
						<?php if(is_img($anunciante->logotipo)){ ?><img src='<?php echo $mainFolder; ?>/uploads/anunciante_logotipo/<?php echo $anunciante->logotipo; ?>' /><?php }else{ ?> <a href='<?php echo $mainFolder; ?>/uploads/anunciante_logotipo/<?php echo $anunciante->logotipo; ?>' target='_blank'><?php echo $anunciante->logotipo; ?></a> <?php } ?>
						<a href="javascript:document.getElementById('logotipo').value = ''; document.getElementById('div_logotipo').innerHTML=''; document.getElementById('div_logotipo').style.display='none'; jQuery('#uploadify').mpDeleteFile('uploadify_logotipo'); "><img title='Excluir' alt='Excluir' class='del' src='<?php echo $mainFolder; ?>/controlplus/includes/imgs/icon_del.gif'/></a>
                    </div>
                <?php }else{ ?>
                	<input type='hidden' name='cont_uploadify_logotipo' id='cont_uploadify_logotipo' value='0' />
                <?php } ?>	   		</div>
       </div><br/>

<!-- ******************************************************************************* -->
       <label>
       	   Sexo:<br/>
       	   <input type='text' name='sexo' id='sexo' value='<?php echo $anunciante->sexo; ?>' /><br/><br/>
       </label>

       <label>
       	   CPF:<br/>
       	   <input type='text' name='cpf' id='cpf' value='<?php echo $anunciante->cpf; ?>' /><br/><br/>
       </label>

       <label>
       	   Nome Fantasia:<br/>
       	   <input type='text' name='fantasia' id='fantasia' value='<?php echo $anunciante->fantasia; ?>' /><br/><br/>
       </label>

       <label>
       	   CNPJ:<br/>
       	   <input type='text' name='cnpj' id='cnpj' value='<?php echo $anunciante->cnpj; ?>' /><br/><br/>
       </label>

       <label>
       	   Telefone (1):<br/>
       	   <input type='text' name='telefone1' id='telefone1' value='<?php echo $anunciante->telefone1; ?>' /><br/><br/>
       </label>

       <label>
       	   Telefone (2):<br/>
       	   <input type='text' name='telefone2' id='telefone2' value='<?php echo $anunciante->telefone2; ?>' /><br/><br/>
       </label>

       <label>
       	   Telefone (3):<br/>
       	   <input type='text' name='telefone3' id='telefone3' value='<?php echo $anunciante->telefone3; ?>' /><br/><br/>
       </label>

       <label>
       	   O Que Você Produz?:<br/>
       	   <textarea name='oqueproduz' id='oqueproduz'><?php echo $anunciante->oqueproduz; ?></textarea><br/><br/>
       </label>

       <label>
       	   Realiza Entrega?:
       	   <input type='hidden' name='realizaentrega' id='realizaentrega' value='<?php echo $anunciante->realizaentrega == '' ? 0 : $anunciante->realizaentrega; ?>' /><br/><br/>
       	   <input type='checkbox' class='checkbox' name='chbrealizaentrega' id='chbrealizaentrega' value='<?php echo $anunciante->realizaentrega; ?>' onclick='mudaValCheckBox("realizaentrega");' <?php if($anunciante->realizaentrega == 1){echo 'checked="checked"';} ?> /><br/><br/>
       </label>

       <label>
       	   Formas De Pagamento:<br/>
       	   <textarea name='formasdepagamento' id='formasdepagamento'><?php echo $anunciante->formasdepagamento; ?></textarea><br/><br/>
       </label>

       <label>
       	   Atende Ligações?:
       	   <input type='hidden' name='atendeligacoes' id='atendeligacoes' value='<?php echo $anunciante->atendeligacoes == '' ? 0 : $anunciante->atendeligacoes; ?>' /><br/><br/>
       	   <input type='checkbox' class='checkbox' name='chbatendeligacoes' id='chbatendeligacoes' value='<?php echo $anunciante->atendeligacoes; ?>' onclick='mudaValCheckBox("atendeligacoes");' <?php if($anunciante->atendeligacoes == 1){echo 'checked="checked"';} ?> /><br/><br/>
       </label>

       <label>
       	   Frequência De Visualização De E-mail?:<br/>
       	   <input type='text' name='frequenciaemail' id='frequenciaemail' value='<?php echo $anunciante->frequenciaemail; ?>' /><br/><br/>
       </label>

       <label>
       	   Autoriza O Sebrae?:
       	   <input type='hidden' name='autorizaosebrae' id='autorizaosebrae' value='<?php echo $anunciante->autorizaosebrae == '' ? 0 : $anunciante->autorizaosebrae; ?>' /><br/><br/>
       	   <input type='checkbox' class='checkbox' name='chbautorizaosebrae' id='chbautorizaosebrae' value='<?php echo $anunciante->autorizaosebrae; ?>' onclick='mudaValCheckBox("autorizaosebrae");' <?php if($anunciante->autorizaosebrae == 1){echo 'checked="checked"';} ?> /><br/><br/>
       </label>

       <label>
       	   Esta Liberado?:
       	   <input type='hidden' name='liberado' id='liberado' value='<?php echo $anunciante->liberado == '' ? 0 : $anunciante->liberado; ?>' /><br/><br/>
       	   <input type='checkbox' class='checkbox' name='chbliberado' id='chbliberado' value='<?php echo $anunciante->liberado; ?>' onclick='mudaValCheckBox("liberado");' <?php if($anunciante->liberado == 1){echo 'checked="checked"';} ?> /><br/><br/>
       </label>

       <br/>
		<div class='area_btns'>
			<input type='submit'  style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_salvar.gif) no-repeat; width:101px; height:36px;' class='btn1' alt='Salvar' value='' />
			<input type='button' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_cancelar.gif) no-repeat; width:101px; height:36px;' class='btn2' alt='Cancelar' value='' onclick="window.location='<?php echo $mainFolder; ?>/controlplus/listAnunciante'" />
           <img style="float:left; margin:15px;" id="cpload1" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/cpload.gif"/>
       </div>
   </form>
   </div>


   <div id='info' title='controlplus - informação'></div>
</div>
<!-- end conteudo -->
<?php include('template/bottom.php'); ?> 
