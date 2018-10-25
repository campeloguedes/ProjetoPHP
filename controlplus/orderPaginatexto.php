<?php include('template/config-init.php'); ?>
<?php
require('controller/PaginatextoController.class.php');
$paginatextoController = new PaginatextoController();  

if(isset($idMP)){
$paginatexto =  $paginatextoController->listarPorId($idMP);
}else{
$paginatexto = new Paginatexto();
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

function response(data){
$('#cpload1').hide();
$('.btn1').show();
$('.btn2').show();
if(data==1){
window.location = '<?php echo $mainFolder ?>/controlplus/listPaginatexto';
}
if(data==2){
window.location = '<?php echo $mainFolder ?>/controlplus/listPaginatexto';
}
if(data==0){
document.getElementById('info').innerHTML = '<p>Ocorreu um erro inesperado!<br/>Verifique os dados do cadastro e tente novamente!</p>';
$('#info').dialog('open'); 
}
}
</script>
<script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/jquery-ui/development-bundle/ui/ui.sortable.js'></script>
<script type='text/javascript'>
$(function() {
$('#area_modulos').sortable({
placeholder: 'ui-state-highlight',
update: function(event, ui){ 
var arr = new Array(); 
arr = $('#area_modulos').sortable('toArray');
for(i = 0; i < arr.length; i++){
str = arr[i].split('_');
n = str[1];
document.getElementById('posicao_'+n).value = i+1;
}
$('#area_modulos').sortable('refresh');
$('#area_modulos').sortable('refreshPositions');
}
});
$('#area_modulos').disableSelection();
});
</script>
<!-- end head -->
<?php include('template/top.php'); ?>
<?php include('template/menu.php'); ?>
<!-- conteudo -->
<div id='Content'>
<div class='category'>
<span class='title'>Ordenação</span>
<img src='<?php echo $mainFolder; ?>/controlplus/includes/imgs/seta_indic.gif' alt='Info' />
<span class='sub_title'>Ordene os Elementos</span> 
</div>
<br clear='all' /> 
<div id='Form'>
<form id='formCad' name='formCad' class='formular'  action='<?php echo $mainFolder; ?>/mediaplus/controller/mpcontroller' method='post' accept-charset='utf-8'>
<?php $paginatextoController = new PaginatextoController(); ?>
<?php $paginatextos = $paginatextoController->listarOrdenado('posicao asc'); ?>
<input type='hidden' name='classe' id='classe' value='PaginatextoController' />
<input type='hidden' name='acao' id='acao' value='salvarColecao' />
<input type='hidden' name='metodo' id='metodo' value='salvarPosicao' />
<input type='hidden' name='objeto' id='objeto' value='Paginatexto' />
<input type='hidden' name='tamanhoColecao' id='tamanhoColecao' value='<?php echo $paginatextos->count(); ?>' />
<div id='area_modulos'>
<?php $contM = 0; ?>
<?php foreach($paginatextos as $paginatexto){ 
$contM++;
?>
<div id='modulo_<?php echo $contM; ?>' class='camadaCompostaMini'>
<input type='hidden' id='idpaginatexto_<?php echo $contM; ?>' name='idpaginatexto_<?php echo $contM; ?>' value='<?php echo $paginatexto->idpaginatexto; ?>' />
<input type='hidden' name='posicao_<?php echo $contM; ?>' id='posicao_<?php echo $contM; ?>' value='<?php echo $contM; ?>' />
<b><?php echo $paginatexto->titulo; ?></b>
</div>
<?php } ?>
</div><br/>

<div class='area_btns'>
<input type='submit' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_salvar.gif) no-repeat; width:101px; height:36px;' class='btn1' alt='Salvar' value='' />
<input type='button' style='background:url(<?php echo $mainFolder; ?>/controlplus/includes/imgs/button_cancelar.gif) no-repeat; width:101px; height:36px;' class='btn2' alt='Cancelar' value='' onclick="window.location='<?php echo $mainFolder; ?>/controlplus/listPaginatexto'" />
<img style='float:left; margin:15px;' id='cpload1' src='<?php echo $mainFolder; ?>/controlplus/includes/imgs/cpload.gif'/>
</div>
</form>
</div>
<div id='info' title='controlplus - informação'></div>
</div> 
<!-- end conteudo -->
<?php include('template/bottom.php'); ?>
