<?php
ob_start();
error_reporting("E_ALL");
$siteName = "Feito no Tocantins";
$mainFolder = ""; // diretorio
$urlFile = "http://www.feitonotocantins.com.br"; // url arquivos

@session_start();
$_SESSION["tipo"] = 2;


$parametros = explode("/", $_GET['url']);

if ($parametros[0] == 'controlplus') {
        
		$act = explode("/", $_GET['url']);

		if(sizeof($act) == 4){
			$page = $act[sizeof($act)-3];
			$catMP  = $act[sizeof($act)-2];
			$idMP   =	$act[sizeof($act)-1];
			if(file_exists($act[0]."/".$page . ".php")){
				require ($act[0]."/".$page . ".php");	
			}else{
				require ("erro.php");
			}
		}else if(sizeof($act) == 3){
			$page = $act[sizeof($act)-2];
			$idMP   =	$act[sizeof($act)-1];
			if(file_exists($act[0]."/".$page . ".php")){
				require ($act[0]."/".$page . ".php");	
			}else{
				require ("erro.php");
			}
		}else if(sizeof($act) == 2){
			$page = $act[1];
			if(file_exists($act[0]."/".$page . ".php")){
				require ($act[0]."/".$page . ".php");	
			}else{
				require ("erro.php");
			}
		}

		return;
		
} 


if (!file_exists($_GET['url'] . ".php")) {

    //parametros
    

    //parametros estaticos (Retrocompatibilidade)
   $page = !empty($parametros[0]) ? $parametros[0] : NULL;
   $idMP = !empty($parametros[1]) ? $parametros[1] : NULL;
   $descMP = !empty($parametros[2]) ? $parametros[2] : NULL;
   $orderMP = !empty($parametros[3]) ? $parametros[3] : NULL;
   
    if (file_exists($page . ".php")) {

        require($page . ".php");
    } else {

        //error 404 (Pagina nao encontrada)
        if (file_exists('error404.php')) {
            @require("error404.php");
        }
    }
} else {


    $page = $_GET['url'];

    require($_GET['url'] . ".php");
}
ob_end_flush();
?>