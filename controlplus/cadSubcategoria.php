<?php include('template/config-init.php'); ?> 
<?php 
 require('controller/SubcategoriaController.class.php');  
 $subcategoriaController = new SubcategoriaController();  

 if(isset($idMP)){

    $subcategoria =  $subcategoriaController->listarPorId($idMP); 
   

 }else{   
  $subcategoria = new Subcategoria();   
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
               categoria_idcategoria: { 
                   required: true 
               }, 

               nome: { 
                   required: true, 
                   maxlength: 255 
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
		<span class='title'>Subcategoria</span> 
		<img src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/seta_indic.gif" alt='Info' /> 
		<span class='sub_title'>Cadastro De Subcategoria</span> 
   </div>

 <br clear='all' /> 

   <div id='Form'>
   <form class='formular' id='formCad' name='formCad' action='<?php echo $mainFolder; ?>/mediaplus/controller/mpcontroller' method='post' accept-charset='utf-8'>

       <input type='hidden' name='classe' id='classe' value='SubcategoriaController' />
       <input type='hidden' name='acao' id='acao' value='salvar' />
       <input type='hidden' name='objeto' id='objeto' value='Subcategoria' />

       <input type='hidden' id='idsubcategoria' name='idsubcategoria' value='<?php echo $subcategoria->idsubcategoria; ?>' />

	   <?php 
        require('controller/CategoriaController.class.php');  
        $categoriaController = new CategoriaController();  
       ?>
       <label>
       	   Categoria:<br/>
       	   <select name='categoria_idcategoria' id='categoria_idcategoria' >
             			<option value=''>Selecione uma opção..</option>
                    <?php $categorias = $categoriaController->listarOrdenado('categoria.nome'); ?>
 					<?php foreach($categorias as $categoria){ ?>
             			<option value='<?php echo $categoria->idcategoria; ?>' <?php if($subcategoria->Categoria->idcategoria == $categoria->idcategoria){echo 'selected=\'selected\'';} ?> ><?php echo $categoria->nome; ?></option>
                    <?php } ?>
             </select><?php if($subcategoria->Categoria->idcategoria != '' && $subcategoria->Categoria->idcategoria != 0){ ?> <a href='<?php echo $mainFolder; ?>/controlplus/cadCategoria/<?php echo $subcategoria->Categoria->idcategoria; ?>' style='color:#0066ff; margin-left:15px; float:left; padding-top:15px;' target='_blank' />Ver Dados</a><?php } ?><br/><br/>
       </label>

       <label>
       	   Nom:<br/>
       	   <input type='text' name='nome' id='nome' value='<?php echo $subcategoria->nome; ?>' /><br/><br/>
       </label>

       <br/>
		<div class='area_btns'>
			<input type='submit'  style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_salvar.gif) no-repeat; width:101px; height:36px;' class='btn1' alt='Salvar' value='' />
			<input type='button' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_cancelar.gif) no-repeat; width:101px; height:36px;' class='btn2' alt='Cancelar' value='' onclick="window.location='<?php echo $mainFolder; ?>/controlplus/listSubcategoria'" />
           <img style="float:left; margin:15px;" id="cpload1" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/cpload.gif"/>
       </div>
   </form>
   </div>


   <div id='info' title='controlplus - informação'></div>
</div>
<!-- end conteudo -->
<?php include('template/bottom.php'); ?> 
