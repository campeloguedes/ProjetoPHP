<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



    <head>

    

        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

        <meta name="robots" content="noindex, nofollow" />

    

        <script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/jquery.js"></script>
<script charset="utf-8" id="injection_graph_func" src="<?php echo $mainFolder; ?>/controlplus/includes/js/injection_graph_func.js"></script>
<script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/keypad/jquery.keypad.pack.js"></script>
<script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/keypad/jquery.keypad.js"></script>
<script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/keypad/jquery.keypad-pt-BR.js"></script>
<link rel="stylesheet" href="<?php echo $mainFolder; ?>/controlplus/includes/js/keypad/jquery.keypad.css" type="text/css" media="screen" charset="iso-8859-1">
<link type="text/css" href="<?php echo $mainFolder; ?>/controlplus/includes/js/ui-dialog/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/ui-dialog/dialog/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $mainFolder; ?>/controlplus/includes/js/ui-dialog/dialog/ui.dialog.js"></script>
<link type="text/css" href="<?php echo $mainFolder; ?>/controlplus/includes/js/ui-dialog/dialog/dialog.css" rel="stylesheet" />
<script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/form-validate/jquery.form.js'></script>
<script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/form-validate/jquery.validate.js'></script>
<script type='text/javascript' src='<?php echo $mainFolder; ?>/controlplus/includes/js/form-validate/jquery.maskedinput-1.2.2.js'></script>
<link rel="stylesheet" href="<?php echo $mainFolder; ?>/controlplus/includes/css/login.css" type="text/css" media="screen" charset="iso-8859-1">

    

        <title>Controlplus - Identifique-se</title>



		<script type="text/javascript">

		$(function() { 
		     $('#login').validate({ 
		           submitHandler: function(form) {
		              $(form).ajaxSubmit({
			             dataType: 'html',
			             type: 'post',
			             success: response,
						 error: error
		               });
		            },
		     		rules: { 
		               usuario: { 
		                   required: true, 
		                   maxlength: 80 
		               }, 

		               senha: { 
		                   required: true, 
		                   maxlength: 20 
		               } 

		            } 
		      }); 
		  }); 
		  
		  $(function() { 
		  	   $('#info').dialog({ 
		  	   		resizable: true,  
		  	   		minHeight: 90,  
		  	   		height: 90,  
		  	   		modal: true,  
		  	   		autoOpen: false  
		      });
		  });
		  
		  function response(data){
			   
				if(data==0){
					document.getElementById("info").innerHTML = "Usuário ou senha incorretos!"
					$('#info').dialog('open');
					
				}else{
					window.location="<?php echo $mainFolder; ?>/controlplus/index";	
				}
		         
			   
		    }

		 function error(data)	{
			alert(data.status+' '+data.statusText);
		 }

		  function senhaBox(id) {

		      elemento = document.getElementById(id);

		      if (elemento.style.display == "none") elemento.style.display = "block";

		      else elemento.style.display = "none";

		  }
					


		
            function senhaBox(id) {

                elemento = document.getElementById(id);

                if (elemento.style.display == "none") elemento.style.display = "block";

                else elemento.style.display = "none";

            }

        </script>



    </head>



    <body>

    

        <div id="all">



            <div id="topo">

            

                <div class="logo"><img src="includes/imgs/login-controlplus-2.png" width="151" height="57" title="Control Plus - Identifique-se" alt="Control Plus - Identifique-se" /></div>

                <div class="icone"><img src="includes/imgs/login-icone.png" width="70" height="24" title="Control Plus - Identifique-se" alt="Controlplus - Identifique-se" /></div>

            

            </div>



            <div class="top"><img src="includes/imgs/login-form-bg-top.png" width="317" height="32" /></div>



            <div id="form">

                       

                <form id="login" method="post" action='<?php echo $mainFolder; ?>/mediaplus/controller/mpcontroller'>
		            	<input type='hidden' name='classe' id='classe' value='LoginController' />
				        <input type='hidden' name='acao' id='acao' value='logar' />
				        <input type='hidden' name='objeto' id='objeto' value='Admin' />

                

                	<label>Informe seus dados de Administrador abaixo para acessar o Controlplus.</label>

                    

                    <input name="usuario" id="usuario" type="text" value="Usuário" onfocus="if (this.value == 'Usuário') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Usuário';}" />

                    <input name="senha" id="senha" type="password" value="senha" class="senha" onfocus="if (this.value == 'senha') {this.value = '';}" onblur="if (this.value == '') {this.value = 'senha';}" />

                    

                    <a href="javascript:senhaBox('lembrarSenha');">Esqueceu sua senha?</a>

                    <input name="botao" id="botao" type="image" src="<?php echo $mainFolder; ?>/controlplus/includes/imgs/login-botao-entrar2.png" style="height: 36px; margin: 10px 0px 0px 38px; width: 81px; border: none;" value="" />



                </form>



                <form action="#" method="post" id="lembrarSenha" style="display: none;">



                	<img src="includes/imgs/login-line-horizontal.gif" height="1" width="240" class="line" />

                    

                    <label>Se você é um Administrador informe seu e-mail no campo abaixo e aguarde o envio dos dados de acesso ao Control Plus.</label>

                        

                    <input name="email" type="text" value="Digite seu e-mail aqui" onfocus="if (this.value == 'Digite seu e-mail aqui') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Digite seu e-mail aqui';}" />

                    <input name="botao2" type="submit" class="botao" />



                </form>



            </div>



            <div class="bottom"><img src="includes/imgs/login-form-bg-bottom.png" width="317" height="32" /></div>



			<div id="rodape">



                <div class="info">

                	<span class="txt-preto">Suporte Palmasite</span><br />

                    E-mail: <a href="mailto:suporte@palmasite.com" class="link">suporte@palmasite.com</a><br />

                    Telefone: (63) 3026-0707 ou (11) 3522-5240

                </div>

                


            </div>



        </div>

    
<div id='info' title='controlplus - informação'></div>
    </body>



</html>
