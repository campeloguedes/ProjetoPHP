<?php include('template/config-init.php'); ?>
<?php
require('controller/ProdutoController.class.php');
$produtoController = new ProdutoController(); 

 if(isset($idMP)){
     $d =  $produtoController->listarPorId($idMP);
     if($d->fotodestaque == ''){
       @header("location: $mainFolder/controlplus/listProduto");
       return;
     }
		require('controlplus/includes/php/WideImage/WideImage.inc.php');
     $image = wiImage::load('uploads/produto_fotodestaque/'.$d->fotodestaque);
     if($image->getWidth() > 770){
	      $h = $height = (770*$image->getHeight()) / $image->getWidth();
	      $w = $width = 770;
     }else{
       $w = $width = $image->getWidth();
       $h = $height = $image->getHeight();
     }
}else{
     $d = new Produto();  
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
       }
    });
});

$(function() { 
	  $('#info').dialog({ 
	    resizable: true, 
     minHeight: 100, 
     height: 110,  
     modal: true,
     autoOpen: false  
   });
});

function response(data){   $('#cpload1').hide();   $('.btn1').show();
   $('.btn2').show();
   if(data==1 || data == 2){   	window.location = '<?php echo $mainFolder ?>/controlplus/listProduto';	  }
   else if(data==0){
		document.getElementById('info').innerHTML = '<p>Ocorreu um erro inesperado!<br/>Verifique os dados do cadastro e tente novamente!</p>'; $('#info').dialog('open');
	  }
}

</script>
<link rel='stylesheet' href='<?php echo $mainFolder; ?>/controlplus/includes/js/jcrop/css/jquery.Jcrop.css' type='text/css' />
<script src='<?php echo $mainFolder; ?>/controlplus/includes/js/jcrop/js/jquery.Jcrop.js'></script>

<script type='text/javascript'>

$(function(){
   $('.crop_1').Jcrop({
      aspectRatio: 275 / 275,
      onSelect: updateCoords_1,
      onChange: showPreview_1
   });
});

function updateCoords_1(c){
	  $('#x_1').val(c.x);
   $('#y_1').val(c.y);
   $('#w_1').val(c.w);
   $('#h_1').val(c.h);
}

function showPreview_1(coords){
  if (parseInt(coords.w) > 0){
    var rx = 275 / coords.w;
    var ry = 275 / coords.h;
    jQuery('#preview_1').css({
    	width: Math.round(rx * <?php echo $w; ?>) + 'px',
    	height: Math.round(ry * <?php echo $h; ?>) + 'px',
    	marginLeft: '-' + Math.round(rx * coords.x) + 'px',
    	marginTop: '-' + Math.round(ry * coords.y) + 'px'
    });
  }
}

</script>
<!-- end head -->
<?php include('template/top.php'); ?>
<?php include('template/menu.php'); ?>
<!-- conteudo -->
<div id='Content'> 
   <div class='category'>
     <span class='title'>Crop</span>
     <img src='<?php echo $mainFolder; ?>/controlplus/includes/imgs/seta_indic.gif' alt='Info' /> 
     <span class='sub_title'>Recorta Foto De Destaque</span>
   </div>
   <br clear='all' />

   <div id='Form'>
   <form id='formCad' name='formCad' class='formular' action='<?php echo $mainFolder; ?>/mediaplus/controller/crop' method='post' accept-charset='utf-8'>
       <input type='hidden' name='urlImagem' id='urlImagem' value='uploads/produto_fotodestaque/<?php echo $d->fotodestaque; ?>' />
       <input type='hidden' name='qtdCrop' id='qtdCrop' value='1' />
       <input type='hidden' id='w_img' name='w_img' value='<?php echo $image->getWidth(); ?>' />
       <input type='hidden' id='w_preview' name='w_preview' value='<?php echo $w; ?>' />
       <h1>Listagem:</h1>
       <input type='hidden' name='urlSaveImagem_1' id='urlSaveImagem_1' value='uploads/produto_fotodestaque/1_<?php echo $d->idproduto; ?>_<?php echo $d->fotodestaque; ?>' />
       <input type='hidden' name='width_1' id='width_1' value='275' />
       <input type='hidden' name='height_1' id='height_1' value='275' />
       <input type='hidden' id='x_1' name='x_1' />
       <input type='hidden' id='y_1' name='y_1' />
       <input type='hidden' id='w_1' name='w_1' />
       <input type='hidden' id='h_1' name='h_1' />
       <img class='crop_1' src='<?php echo $mainFolder; ?>/uploads/produto_fotodestaque/<?php echo $d->fotodestaque; ?>' width='<?php echo $w; ?>' />
       <br/>
       <h2>Preview:</h2>
       <div style='width:275px; height:275px; overflow:hidden;'>
				<img src='<?php echo $mainFolder; ?>/uploads/produto_fotodestaque/<?php echo $d->fotodestaque; ?>' id='preview_1' />
       </div>
       <br/>

       <div class='area_btns'>
          <input type='submit' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_salvar.gif) no-repeat; width:101px; height:36px;' class='btn1' alt='Salvar' value='' />
          <input type='button' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_cancelar.gif) no-repeat; width:101px; height:36px;' class='btn2' alt='Cancelar' value='' onclick="window.location='<?php echo $mainFolder; ?>/controlplus/listProduto'" />
          <img style='float:left; margin:15px;' id='cpload1' src='<?php echo $mainFolder; ?>/controlplus/includes/imgs/cpload.gif'/>
       </div>
    </form>
</div>
<div id='info' title='controlplus - informação'></div>
</div>
<!-- end conteudo -->
<?php include('template/bottom.php'); ?>
