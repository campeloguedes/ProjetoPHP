<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en_US" xml:lang="en_US">

 <head>
  <title>Controlplus</title>
  
  <script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/mputils.js"></script>
  <script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/jquery.js"></script>
  <script charset="utf-8" id="injection_graph_func" src="<?php echo $mainFolder; ?>/controlplus/includes/js/injection_graph_func.js"></script>
  <script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/jgrowl/jquery.jgrowl.js'></script>
  <link rel="stylesheet" type="text/css" href="<?php echo $mainFolder; ?>/controlplus/includes/js/jgrowl/jquery.jgrowl.css" />
  <script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/menu-collapse/menu.js"></script>
  <link type="text/css" href="<?php echo $mainFolder; ?>/controlplus/includes/js/ui-dialog/themes/base/ui.all.css" rel="stylesheet" />
  <script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/ui-dialog/dialog/ui.core.js"></script>
  <script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/ui-dialog/dialog/ui.dialog.js"></script>
  <link type="text/css" href="<?php echo $mainFolder; ?>/controlplus/includes/js/ui-dialog/dialog/dialog.css" rel="stylesheet" />
  <script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/form-validate/jquery.form.js'></script>
  <script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/priceformat/priceFormat.js'></script>
  <script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/jquery-ui/development-bundle/external/bgiframe/jquery.bgiframe.js'></script>
  <script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/corner/jquery.corner.js'></script> 
  <!-- Folha(s) de estilo -->
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $mainFolder; ?>/controlplus/includes/css/layout.css" />

	<!-- Javascript(s) -->
	<script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/padrao.js"></script>

	<!--[if lte IE 6]>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $mainFolder; ?>/controlplus/includes/css/layout-ie6.css" />

	<script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/transparencia_ie.js"></script>
	<script>DD_belatedPNG.fix('img, input');</script>
	<![endif]--> 
	
	<script type="text/javascript">
	    var navegador = navigator.appName;
		var versaoNavegador = parseFloat(navigator.appVersion.split("MSIE")[1]);
	
		$(function() { 
		  	   $('#info_sendsupport').dialog({ 
		  	   		bgiframe: true,  
		  	   		resizable: true,  
		  	   		minHeight: 100,  
		  	   		height: 110,  
		  	   		modal: true,  
		  	   		autoOpen: false  
		      });
		  });

		function enviaSolicitacao(){
			var mensagem = document.getElementById("c2").value;
			if(mensagem == '' || mensagem == 'Envie sua solicitação de suporte ...'){
				document.getElementById('info_sendsupport').innerHTML = 'Mensagem inválida!<br/>Tente novamente.';
				$('#info_sendsupport').dialog('open');
			}else{
				var url = '<?php echo $_SERVER['HTTP_HOST']; ?>';
				var remetente = '<?php echo $_SESSION['identificacao']; ?>';
				$.ajax({ 
					 type: 'POST', 
					 url: '<?php echo $mainFolder; ?>/mediaplus/controller/sendsupport', 
					 data: 'mensagem='+mensagem+'&url='+url+'&remetente='+remetente, 
					 beforeSend: function() {}, 
					 success: function(txt) {document.getElementById('info_sendsupport').innerHTML = 'Mensagem enviada com sucesso!<br/>Iremos analisar e responder o mais rápido possível.'; $('#info_sendsupport').dialog('open'); }, 
					 error: function(txt) { document.getElementById('info').innerHTML = '<p>Ocorreu um erro inesperado!<br/>Tente novamente!</p>'; $('#info').dialog('open'); } 
		       }); 
			}
		}

	</script>
    
    <style type="text/css">
	#Form input{
		width:550px;	
	}
	</style>