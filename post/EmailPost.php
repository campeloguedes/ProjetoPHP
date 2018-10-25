<?php

@header("Content-Type: application/json");

if(!empty($_POST)){

  $parametros = array_keys($_POST);
  
  $email_retorno = $_POST['email'];
  
  $corpoMail = "<table cellpadding='0' cellspacing='0' vspace='0'>";
  foreach($parametros as $par){
    if( !empty($_POST[$par]) ){
      $titulo =  strtoupper($par);
      $titulo = str_replace("_"," ",$titulo);
      $corpoMail .= "<tr><td>".$titulo."</td><td>".$_POST[$par]."</td></tr>";
    }
  }
  $corpoMail .= "</table>";

  $Return_path =  'site@'.str_replace("www.", "", $_SERVER['HTTP_HOST']);

  $head = "MIME-Version: 1.0\nContent-Type: text/html; charset=iso-8859-1\nFrom: $Return_path\nReturn-Path: $Return_path\nReply-To:".$email_retorno."\n";
  $titulo = 'Contato Site - '.$_SERVER['HTTP_HOST'];
  
   $body = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
            <html xmlns=\"http://www.w3.org/1999/xhtml\">
            <head>
            <meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
            <title>$titulo </title>
            <style type='text/css'>
            table , tr, td { padding:4px; border:1px solid #f5f5f5; }
            </style>
            </head>
            <body>
            $corpoMail
            </body>
            </html>";
  
  $data = array(
    'error' => '', 
    'message' => 'E-mail enviado com sucesso',
    'complement' => 'Em breve retornaremos',
    'callback' => ''
  );

  echo json_encode($data);
  
  $email = $_POST['anunciante'];	  
  if($email != ""){
	  
	  @mail( $email , $titulo, $body, $head, "-r".$Return_path);
	  
  }else{
	  @require_once("controller/GeralController.class.php");
	  $GeralController = new GeralController();
	  $geral = $GeralController->listarPorId(1);
	  $email = $geral->email;
	
	  @mail( $email , $titulo, $body, $head, "-r".$Return_path);
  }

} else {

   $data = array(
    'error' => '1', 
    'message' => 'Falha ao enviar e-mail',
    'complement' => 'Tente novamente',
    'callback' => ''
  );

  echo json_encode($data);

}

?>