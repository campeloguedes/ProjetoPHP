<?php include('template/config-init.php'); ?> 
<?php 
 require('controller/PerfilController.class.php');  
 $perfilController = new PerfilController();  

 if(isset($idMP)){

    $perfil =  $perfilController->listarPorId($idMP);   

 }else{   
  $perfil = new Perfil();   
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
               nome: { 
                   required: true, 
                   maxlength: 45 
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
		<span class='title'>Perfil</span> 
		<img src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/seta_indic.gif" alt='Info' /> 
		<span class='sub_title'>Cadastro De Perfil</span> 
   </div>

 <br clear='all' /> 

   <div id='Form'>
   <form class='formular' id='formCad' name='formCad' action='<?php echo $mainFolder; ?>/mediaplus/controller/mpcontroller' method='post' accept-charset='utf-8'>

       <input type='hidden' name='classe' id='classe' value='PerfilController' />
       <input type='hidden' name='acao' id='acao' value='salvarEmCascata2' />
       <input type='hidden' name='objeto' id='objeto' value='Perfil' />

       <input type='hidden' id='idperfil' name='idperfil' value='<?php echo $perfil->idperfil; ?>' />

       <label>
       	   Nome:<br/>
       	   <input type='text' name='nome' id='nome' value='<?php echo $perfil->nome; ?>' /><br/><br/>
       </label>

  <input type="hidden" name="totalSavesCascata" id="totalSavesCascata" value="1" />
  		<!--******************************************************************************-->

  		<!--Collection Perfilmodulos-->

  		<input type="hidden" name="objetoM2M_1" id="objetoM2M_1" value="Perfilmodulo" />
  		<input type="hidden" name="objetoM_1" id="objetoM_1" value="Modulo" />
  		<input type="hidden" name="typeObject_1" id="typeObject_1" value="n" />

  <label>
       <div class="area_title"><div class="box_title"><span class="cad">SELECIONE OS MÓDULOS</span></div></div>
  </label>
  		<?php
  		require_once("controller/PerfilmoduloController.class.php");
  		require_once("controller/ModuloController.class.php");
  		$moduloController = new ModuloController();
  		$modulos = $moduloController->listarTodos();
  		$cont = 0;
  		foreach($modulos as $modulo){
  			$cont++;
  			if($cont == 1){
  			?>
  			<label>
  				<div style="float:left;">
  					
  				<?php
  			}
  				$check = false;
  				$perfilmoduloController = new PerfilmoduloController();
				$perfil->idperfil = $perfil->idperfil != "" ? $perfil->idperfil : 0;
  				$perfilmodulo = $perfilmoduloController->listarOnde2("perfil_idperfil = $perfil->idperfil and modulo_idmodulo = $modulo->idmodulo");
  				if(!$perfilmodulo == null){
  					$check = true;
  				}
  				?>
  				
  				<div style="float: left; width: 180px; height: 45px;">
	  				<div style="width: 10px;"><input class="checkbox" style="float:left;" type="checkbox" name="modulo_idmodulo_<?php echo $modulo->idmodulo; ?>" id="modulo_idmodulo_<?php echo $modulo->idmodulo; ?>" value="<?php echo $modulo->idmodulo; ?>" <?php if($check){ ?> checked="checked" <?php } ?> /></div>
	  				<div style="width:140px"><label style="margin-right:10px; float:left; width:100px;"><?php echo $modulo->nome; ?></label></div>
	  			</div>
  				<?php
  				if($cont == 4){
  				?>
				  </div>
				</label>
				<?php	
				$cont = 0;
				}
		}
		if($cont != 0){
			for($x = 1; $x <= (5-$cont); $x++){ ?><td></td><td></td><?php	} ?>	
		
			</div>	
		 </label>
		 <?php
		 $cont = 0;
 	    }
		 ?>
  		<!--******************************************************************************-->

       <br/>
		<div class='area_btns'>
			<input type='submit' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_salvar.gif) no-repeat; width:101px; height:36px;' class='btn1' alt='Salvar' value='' />
			<input type='button' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_cancelar.gif) no-repeat; width:101px; height:36px;' class='btn2' alt='Cancelar' value='' onclick="window.location='<?php echo $mainFolder; ?>/controlplus/listPerfil'" />
           <img style="float:left; margin:15px;" id="cpload1" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/cpload.gif"/>
       </div>
   </form>
   </div>


   <div id='info' title='controlplus - informação'></div>
	</div>

</div>
<!-- end conteudo -->
<?php include('template/bottom.php'); ?> 
