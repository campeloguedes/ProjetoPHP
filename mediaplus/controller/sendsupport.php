<?php
	
	if(isset($_POST['remetente']) && isset($_POST['mensagem']) && isset($_POST['url'])){
		
		$url = $_POST['url'];
		$remetente = $_POST['remetente'];
		$mensagem = $_POST['mensagem'];
		
		$head  = "MIME-Version: 1.0\nContent-Type: text/html; charset=iso-8859-1\nFrom: suporte@mediaplus.com.br;";
		
			$body = 
			"<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
			<html xmlns=\"http://www.w3.org/1999/xhtml\">
			<head>
			<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
			<title>Solicitação de Suporte - Control Plus</title>
			 $estilo
			</head>
			
			<body>
				<p>Dados do e-mail:<br/><br/><br/>
				Usuário: $remetente <br/>
				Site: $url <br/>
				Mensagem: $mensagem
			</body>
			</html>";
			
			mail( 'suporte@mediaplus.com.br', 'Solicitação de Suporte - Control Plus', $body, $head );	
			
		
	}


?>