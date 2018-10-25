<?php include('template/config-init.php'); ?> 
<?php 
 require('controller/AdminController.class.php');  
 $adminController = new AdminController();  

 if(isset($idMP)){

    $admin =  $adminController->listarPorId($idMP);   

 }else{   
  $admin = new Admin();   
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
              $('#cpload1').show();
              $(form).ajaxSubmit({
	             dataType: 'html',
	             type: 'post',
	             success: response
               });
            },
     		rules: { 
               perfil_idperfil: { 
                   required: true 
               }, 

               nome: { 
                   required: true, 
                   maxlength: 195 
               }, 

               usuario: { 
                   required: true, 
                   maxlength: 45 
               }, 

               senha: { 
                   required: true, 
                   maxlength: 20 
               }, 

               confirm_senha: { 
                   required: true, 
                   equalTo: '#senha'
               }, 

               foto: { 
                   required: false, 
                   maxlength: 123,
                   email: true 
               }, 

               bloqueado: { 
                   required: false 
               }, 

               nivel: { 
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
	   $('#cpload1').hide();
	   if(data==1){
         document.getElementById('fileSaves_uploadify_foto').innerHTML = '<input type=\'hidden\' name=\'cont_uploadify_foto\' id=\'cont_uploadify_foto\' value=\'0\' />';
         document.getElementById('foto').value = '';
         if(document.getElementById('uploadify_foto_disable') != null)           document.getElementById('uploadify_foto_disable').setAttribute('id', 'uploadify_foto');
		 $('#formCad').resetForm();
         document.getElementById('info').innerHTML = '<p>Salvo com sucesso!</p>'; 
         $('#info').dialog('open'); 
	   }
	   if(data==2){
         document.getElementById('info').innerHTML = '<p>Salvo com sucesso!</p>'; 
         $('#info').dialog('open'); 
	   }
       if(data==0){
         document.getElementById('info').innerHTML = '<p>Ocorreu um erro inesperado!<br/>Verifique os dados do cadastro e tente novamente!</p>';
         $('#info').dialog('open'); 
	   }
  }

</script>


<?php include('template/top.php'); ?> 
<?php include('template/menu.php'); ?> 
<!-- conteudo -->

<div id='Content'> 
   <div class='category'>
		<span class='title'>Administrador</span> 
		<img src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/seta_indic.gif" alt='Info' /> 
		<span class='sub_title'>Alterar Dados</span> 
   </div>

 <br clear='all' /> 

   <div id='Form'>
   <form class='formular' id='formCad' name='formCad' action='<?php echo $mainFolder; ?>/mediaplus/controller/mpcontroller' method='post' accept-charset='utf-8'>

       <input type='hidden' name='classe' id='classe' value='AdminController' />
       <input type='hidden' name='acao' id='acao' value='salvar' />
       <input type='hidden' name='objeto' id='objeto' value='Admin' />

       <input type='hidden' id='idadmin' name='idadmin' value='<?php echo $admin->idadmin; ?>' />
	   <input type='hidden' name='perfil_idperfil' id='perfil_idperfil' value="<?php echo $admin->Perfil->idperfil; ?>">
      
       <label>
       	   Nome:<br/>
       	   <input type='text' name='nome' id='nome' value='<?php echo $admin->nome; ?>' /><br/><br/>
       </label>

       <label>
       	   Usuário:<br/>
       	   <input type='text' name='usuario' id='usuario' value='<?php echo $admin->usuario; ?>' /><br/><br/>
       </label>

       <label>
       	   Senha:<br/>
       	   <input type='password' name='senha' id='senha' value='<?php echo $admin->senha; ?>' /><br/><br/>
       </label>

       <label>
			Confirmar Senha:<br/>
       	   <input type='password' name='confirm_senha' id='confirm_senha' value='<?php echo $admin->senha; ?>' /><br/><br/>
       </label>

<!-- ******************************************************************************* -->
          <label>
       	   E-mail:<br/>
       	   <input type='text' name='foto' id='foto' value='<?php echo $admin->foto; ?>' /><br/><br/>
       </label>

<!-- ******************************************************************************* -->
       
       <input type='hidden' name='bloqueado' id='bloqueado' value='<?php echo $admin->bloqueado; ?>' />
       
       <br/>
		<div class='area_btns'>
			<input type='submit' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_salvar.gif) no-repeat; width:101px; height:36px;' class='btn1' alt='Salvar' value='' />
			<input type='button' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_cancelar.gif) no-repeat; width:101px; height:36px;' class='btn2' alt='Cancelar' value='' onclick="window.location='<?php echo $mainFolder; ?>/controlplus/listAdmin'" />
           <img style="float:left; margin:15px;" id="cpload1" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/cpload.gif"/>
       </div>
   </form>
   </div>


   <div id='info' title='controlplus - informação'></div>
	</div>

</div>
<!-- end conteudo -->
<?php include('template/bottom.php'); ?> 

