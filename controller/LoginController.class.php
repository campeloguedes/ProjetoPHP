<?php

require_once('dao/LoginDao.class.php'); 

class LoginController {
	
	var $dao; 
	
    function LoginController() {
    	 $this->dao = new LoginDao();
    }
    
    function logar($usuario, $senha){
    	return $this->dao->logar($usuario, $senha); 
    }
    
    function listarPaginasPorAdmin($admin_idadmin){
    	return $this->dao->listarPaginasPorAdmin($admin_idadmin);
    }
}
?>