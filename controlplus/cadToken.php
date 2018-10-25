<?php include('template/config-init.php'); ?> 
<?php 
 require('controller/TokenController.class.php');  
 $tokenController = new TokenController();  

 if(isset($idMP)){

    $token =  $tokenController->listarPorId($idMP); 
   

 }else{   
  $token = new Token();   
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
               admin_idadmin: { 
                   required: false 
               }, 

               dt: { 
                   required: false 
               }, 

               codigo: { 
                   required: false, 
                   maxlength: 255 
               }, 

               ip: { 
                   required: false, 
                   maxlength: 255 
               }

            } 
      }); 
  }); 

  jQuery(function($){ 
      $('#dt').mask('99/99/9999 99:99'); 
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

<!-- end head -->

<?php include('template/top.php'); ?> 
<?php include('template/menu.php'); ?> 
<!-- conteudo -->

<div id='Content'> 
   <div class='category'>
		<span class='title'>Token</span> 
		<img src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/seta_indic.gif" alt='Info' /> 
		<span class='sub_title'>Cadastro De Token</span> 
   </div>

 <br clear='all' /> 

   <div id='Form'>
   <form class='formular' id='formCad' name='formCad' action='<?php echo $mainFolder; ?>/mediaplus/controller/mpcontroller' method='post' accept-charset='utf-8'>

       <input type='hidden' name='classe' id='classe' value='TokenController' />
       <input type='hidden' name='acao' id='acao' value='salvar' />
       <input type='hidden' name='objeto' id='objeto' value='Token' />

       <input type='hidden' id='idtoken' name='idtoken' value='<?php echo $token->idtoken; ?>' />

	   <?php 
        require('controller/AdminController.class.php');  
        $adminController = new AdminController();  
       ?>
       <label>
       	   Admin:<br/>
       	   <select name='admin_idadmin' id='admin_idadmin' >
             			<option value=''>Selecione uma opção..</option>
                    <?php $admins = $adminController->listarOrdenado('admin.nome'); ?>
 					<?php foreach($admins as $admin){ ?>
             			<option value='<?php echo $admin->idadmin; ?>' <?php if($token->Admin->idadmin == $admin->idadmin){echo 'selected=\'selected\'';} ?> ><?php echo $admin->nome; ?></option>
                    <?php } ?>
             </select><?php if($token->Admin->idadmin != '' && $token->Admin->idadmin != 0){ ?> <a href='<?php echo $mainFolder; ?>/controlplus/cadAdmin/<?php echo $token->Admin->idadmin; ?>' style='color:#0066ff; margin-left:15px; float:left; padding-top:15px;' target='_blank' />Ver Dados</a><?php } ?><br/><br/>
       </label>

       <label>
       	   Dt:<br/>
       	   <input type='text' name='dt' id='dt' value='<?php echo dthr($token->dt); ?>' /><br/><br/>
       </label>

       <label>
       	   Codigo:<br/>
       	   <input type='text' name='codigo' id='codigo' value='<?php echo $token->codigo; ?>' /><br/><br/>
       </label>

       <label>
       	   Ip:<br/>
       	   <input type='text' name='ip' id='ip' value='<?php echo $token->ip; ?>' /><br/><br/>
       </label>

       <br/>
		<div class='area_btns'>
			<input type='submit'  style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_salvar.gif) no-repeat; width:101px; height:36px;' class='btn1' alt='Salvar' value='' />
			<input type='button' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_cancelar.gif) no-repeat; width:101px; height:36px;' class='btn2' alt='Cancelar' value='' onclick="window.location='<?php echo $mainFolder; ?>/controlplus/listToken'" />
           <img style="float:left; margin:15px;" id="cpload1" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/cpload.gif"/>
       </div>
   </form>
   </div>


   <div id='info' title='controlplus - informação'></div>
</div>
<!-- end conteudo -->
<?php include('template/bottom.php'); ?> 
