<?php
	//session_destroy();
	
	if(!isset($_SESSION['logado_controlplus'])){
		header("Location: index");	
	}else{
		$_SESSION['tipo'] = 1;
		if(!isset($_SESSION['modss'])){
			require_once('controller/LoginController.class.php');
			$_SESSION['modss'] = new ArrayObject();
			$loginController = new LoginController();
			$_SESSION['modss'] = $loginController->listarPaginasPorAdmin($_SESSION['codAdmin']);
			
			require_once('controller/AdminController.class.php');
			$adminController = new AdminController();
			$admin = $adminController->listarPorId($_SESSION['codAdmin']);
			
			$_SESSION['nivel_acesso'] = 1;//$admin->nivel;
			
			require_once('controller/PerfilmoduloController.class.php');
			$_SESSION['modss_objects'] = new ArrayObject();
			$perfilmodController = new PerfilmoduloController();
			foreach($perfilmodController->listarPorPerfil($admin->Perfil->idperfil) as $perfmod){
				$_SESSION['modss_objects']->append(serialize($perfmod));
			}
			
			/**************************************************************************/
			//ULTIMO ACESSO
		  	require_once('controller/LogController.class.php');
		  	$logController = new LogController();
		  	$idadm = $_SESSION['codAdmin'];
		  	$logs = $logController->listarOnde("acao = 'login' and admin_idadmin = $idadm order by dt desc limit 2");
		  	foreach($logs as $l){
		  		$log = $l;
		  	}
		  	$_SESSION['log_dt'] = dt($log->dt);
		  	$_SESSION['log_hr'] = hr($log->dt);
		  	$_SESSION['log_ip'] = $log->ip; 
			/**************************************************************************/
		}
		
		/*if($_SESSION['modss']->count() > 0){
		    
		    if($page != "home"){	
				$acesso = false;
				foreach($_SESSION['modss'] as $p){
					
					if(strtolower($page) == strtolower($p)){
						$acesso = true;
					}
				}
				if(!$acesso){
					header("Location: $mainFolder/controlplus/home/04503");
				}
		    }
		}*/
	 }
	 
	 

?>
