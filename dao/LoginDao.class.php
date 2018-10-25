<?php

require_once('mediaplus/dao/PDOConnectionFactory.class.php'); 
require_once('mediaplus/controller/log.php'); 

class LoginDao extends PDOConnectionFactory{
	
	public $conex = null; 
	
    function LoginDao() {
    	$this->conex = PDOConnectionFactory::getConnection();  
    }
    
    function logar($usuario, $senha){
    	try{
	      $stmt = $this->conex->prepare("SELECT idadmin FROM admin where usuario = ? and senha = ? and bloqueado = 0"); 
	      $this->conex->beginTransaction();
	
	      $stmt->bindValue(1, $usuario);
	      $stmt->bindValue(2, $senha);
	      $stmt->execute();
	
	      foreach($stmt as $row){
	         $ca = $row['idadmin'];
	         $this->conex = null;
	         addLog('admin','login', $ca);
	         return $ca;
	      }
	      
	      addLog('admin','tentativaLogin', 0);
	      return 0;
	
	     }catch ( PDOException $ex ){ 
	        return 0; 
	      }
    	
    	
    }
    
    
    function listarPaginasPorAdmin($admin_idadmin){
    	try{
	      $stmt = $this->conex->prepare("SELECT pagina.nome as pagina_nome from pagina inner join modulo on pagina.modulo_idmodulo = modulo.idmodulo inner join perfilmodulo on perfilmodulo.modulo_idmodulo = modulo.idmodulo inner join perfil on perfilmodulo.perfil_idperfil = perfil.idperfil inner join admin on admin.perfil_idperfil = perfil.idperfil where admin.idadmin = ?"); 
	      $this->conex->beginTransaction();
	
	      $stmt->bindValue(1, $admin_idadmin);
	      $stmt->execute();
		  
		  $paginas = new ArrayObject(); 
	      
	      foreach($stmt as $row){
	         $paginas->append($row["pagina_nome"]);
	      }
	      
	      $this->conex = null;
	      return $paginas;
	
	     }catch ( PDOException $ex ){ 
	        return 0; 
	      }
    	
    	
    }
    
}
?>