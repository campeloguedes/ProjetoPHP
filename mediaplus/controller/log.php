<?php

@session_start();
require_once('controller/LogController.class.php');
 
function addLog($tb, $act, $id){
	
	   
        $log = new Log();
        
        $log->dt     = date("d-m-Y H:i:s");
        $log->tabela = $tb;
        $log->chave  = $id;
        $log->acao   = $act;
        $log->ip     = $_SERVER['REMOTE_ADDR'];
        $log->tipo   = $_SESSION['tipo']; //admin
        
        if(isset($_SESSION['codAdmin'])){
         	$log->Admin->idadmin = $_SESSION['codAdmin'];  
        }else if($act == "login"){
        	$log->tipo = 1;
        	$log->Admin->idadmin = $id;
        }else{
        	$log->Admin->idadmin = null;
         }
         
        $logController = new LogController();
        $logController->salvar($log);	
        
    
}

?>